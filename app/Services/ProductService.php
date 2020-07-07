<?php

namespace App\Services;

use App\Entities\Product;
use App\Entities\User;
use App\Services\Contracts\ProductServiceContract;
use Auth;

class ProductService implements ProductServiceContract
{
    protected $product;
    
    public function __construct(Product $product) 
    {
        $this->product = $product;
    }
    
    public function all()
    {
        return $this->product->all();
    }

    public function getAllAndPaginate($limit = 10, $params = [])
    {
        return $this->product->orderBy('id', 'desc')
            ->paginate($limit);
    }
    
    public function find($id)
    {
        return $this->product->find($id);
    }
    
    public function create(array $attributes)
    {
        return $this->product->create($attributes);
    }
    
    public function update(array $attributes, $id)
    {
        return $this->product->find($id)->update($attributes);
    }
    
    public function delete($id)
    {
        return $this->product->find($id)->delete($id);
    }
}