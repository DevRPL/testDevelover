<?php

namespace App\Services;

use App\Entities\OrderDetail;
use App\Entities\User;
use App\Entities\Order;
use App\Services\Contracts\TransactionServiceContract;
use Auth;

class TransactionService implements TransactionServiceContract
{
    protected $transction;
    
    public function __construct(OrderDetail $transction) 
    {
        $this->transction = $transction;
    }
    
    public function all()
    {
        return Order::with(['user', 'customer'])->get();
    }

    public function getOrderDetail($id)
    {
        return OrderDetail::with('product')->where('order_id', $id)->get();
    }
    
    public function create(array $attributes)
    {
        return $this->transction->create($attributes);
    }

    public function update(array $attributes, $id)
    {
        return $this->transction->find($id)->update($attributes);
    }

    public function delete($id) 
    {
        //
    }

    public function getTransactionlast()
    {
        return Order::orderBy('id', 'desc');
    }
}