<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Services\Contracts\ProductServiceContract;
use Illuminate\Support\Facades\Auth;

class ProductComposer
{
    /**
     * @var ProductServiceContract
     */
    protected $product;

    /**
     * Constructor.
     *
     * @param
     */
    public function __construct(ProductServiceContract $product)
    {
        $this->product = $product;
    }

    /**
     * Bind data to the view.
     *
     * @param View $view
     */
    public function compose(View $view)
    {
        $products = $this->product->all();
        $view->with('products', $products);
    }
}
