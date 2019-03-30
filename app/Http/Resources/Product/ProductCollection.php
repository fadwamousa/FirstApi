<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\Resource;

class ProductCollection extends Resource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
        'name_product'    => $this->name,
        'rating'  => $this->reviews->count() > 0 ? round($this->reviews->sum('star')/$this->reviews->count(),2):'No Rating Found',
        'totalPrice'=> round((1-($this->discount/100))*$this->price),
        'href' => [
            'Product_detail' => route('products.show',$this->id)
        ]

        ];
    }
}
