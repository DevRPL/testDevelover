<?php
namespace App\Services\Contracts;
/**
 * Interface CustomerServiceContract.
 */
interface CustomerServiceContract extends BaseServiceContract
{
	public function getAllAndPaginate($limit = 10, $params = []);
}