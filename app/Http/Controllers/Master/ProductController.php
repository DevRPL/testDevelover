<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Services\Contracts\ProductServiceContract;
use Illuminate\Http\Request;
use Auth;

class ProductController extends Controller
{
    protected $product;

    public function __construct(ProductServiceContract $product)
    {
        $this->product = $product;
    }

    public function index()
    {
        $products = $this->product->all();
        
        return view('admin.product.index', compact('products'));
    }

    public function store(Request $request)
    {
        $request->merge(['user_id' => Auth::user()->id]);

        $this->product->create($request->all());
        
        return redirect()->route('master.products.index');
    }

    public function edit($id)
    {
        $product = $this->product->find($id);

        return view('admin.product.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $request->merge(['user_id' => Auth::user()->id]);


        $this->product->update($request->all(), $id);
        

        return redirect()->route('master.products.index');
    }

    public function destroy($id)
    {
        $this->product->delete($id);

        return redirect()->back();
    }
}