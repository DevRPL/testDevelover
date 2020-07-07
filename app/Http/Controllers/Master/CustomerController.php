<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Services\Contracts\CustomerServiceContract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    protected $customer;

    public function __construct(CustomerServiceContract $customer)
    {
        $this->customer = $customer;
    }

    public function index()
    {
        $customers = $this->customer->all();
        
        return view('admin.customer.index', compact('customers'));
    }
    
    public function store(Request $request)
    {
        $request->merge([
            'user_id' => Auth::user()->id
        ]);
        
        $this->customer->create($request->all());
        
        return redirect()->route('master.customers.index');
    }

    public function edit($id)
    {
        $customer = $this->customer->find($id);

        return view('admin.customer.edit', compact('customer'));
    }

    public function update(Request $request, $id)
    {
        $request->merge([
            'user_id' => Auth::user()->id
        ]);

        $this->customer->update($request->all(), $id);        

        return redirect()->route('master.customers.index');
    }

    public function destroy($id)
    {
        $this->customer->delete($id);

        return redirect()->back();
    }
}