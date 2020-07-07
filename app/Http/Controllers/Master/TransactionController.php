<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Entities\Customer;
use App\Entities\Product;
use App\Entities\Order;
use Illuminate\Http\Request;
use App\Services\Contracts\TransactionServiceContract;
use App\Services\Contracts\CustomerServiceContract;
use App\Services\Contracts\ProductServiceContract;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    protected $transaction;
    protected $customer;
    protected $product;

    public function __construct(
        TransactionServiceContract $transaction,
        CustomerServiceContract $customer,
        ProductServiceContract $product
    ) {
        $this->transaction = $transaction;
        $this->customer = $customer;
        $this->product = $product;
    }

    public function index()
    {
        $transactions =$this->transaction->all();

        return view('admin.transaction.index', compact('transactions'));
    }

    public function create()
    {
        $orderLast = $this->transaction->getTransactionlast()->first();
        $numberOld = isset($orderLast) ? preg_replace('/[^0-9]+/', '', $orderLast->order_number) : 0;
        $numberNew = 'ORD-' . str_pad($numberOld + 1, 6, '0', STR_PAD_LEFT);
        $customers = $this->customer->all();
        $products = $this->product->all();
        return view('admin.transaction.create', compact(
                'numberNew', 'customers', 'products'
            )
        );
    }

    public function store(Request $request)
    {
        $orders = Order::create([
            'date' => $request->date,
            'order_number' => $request->order_number,
            'customer_id' => $request->customer_id,
            'user_id' => Auth::user()->id
        ]);

        if ($orders->exists) {
            for ($i=0; $i < count($request->product_id); $i++) { 
                $this->transaction->create([
                    'order_id' => $orders->id,
                    'product_id' => $request->product_id[$i],
                    'quantity' => $request->quantity[$i],
                    'price' => $request->price[$i],
                    'discount' => $request->discount[$i],
                    'amount' => $request->amount[$i]
                ]);
            }
        }

        return redirect()->route('master.transaksis.index');
    }
    
    public function show($id)
    {   
        $transactions = $this->transaction->getOrderDetail($id);
        
        return view('admin.transaction.show', compact('transactions'));
    }
}
