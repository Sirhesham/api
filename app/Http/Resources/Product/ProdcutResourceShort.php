<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\JsonResource;

class ProdcutResourceShort extends JsonResource
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
            'name' => $this->name,
            'totalPrice' => round((1 - ($this->discount / 100)) * $this->price, 2),
            'discount' => $this->discount,
            'rating' => $this->reviews->count() > 0 ? round($this->reviews->sum('star') / $this->reviews->count(), 2) : 'No Rating yet',
            'href' => [
                'reviews' => route('product.show', $this->id)
            ]
        ];
    }
}
