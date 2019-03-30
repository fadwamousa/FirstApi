<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
       return [
        'name_product'    => $this->name,
        'detail_product'  => $this->detail,
        'price'   => $this->price,
        'stock'   => $this->stock == 0 ?'Out Of stock':$this->stock,
        'rating'  => $this->reviews->count() > 0 ? round($this->reviews->sum('star')/$this->reviews->count(),2):'No Rating Found',
        'totalPrice'=> round((1-($this->discount/100))*$this->price),
        'href' => [
            'reviews' => route('reviews.index',$this->id)
        ],

       ];

    }
}
