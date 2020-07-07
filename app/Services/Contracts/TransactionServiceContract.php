<?php
namespace App\Services\Contracts;
/**
 * Interface TransactionServiceContract.
 */
interface TransactionServiceContract 
{
	public function all();
   
    public function getOrderDetail($id);
    
    public function create(array $attributes);
   
    public function update(array $attributes, $id);
   
    public function getTransactionlast();
}