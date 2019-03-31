<?php

namespace App\Exceptions;

use Exception;

class ProductNotBelongsToUser extends Exception
{
    public function render($request, Exception $exception)
    {
    	return ['data' => 'Product Not Belongs To User' ];
    }
}
