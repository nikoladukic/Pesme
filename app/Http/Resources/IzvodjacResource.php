<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class IzvodjacResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public static $wrap='izvodjac';
    public function toArray($request)
    {
        return [
            'name'=>$this->resource->firstName,
            'surname'=>$this->resource->lastName,
            'birth_year'=>$this->resource->birthYear,
            
        ];
    }
}
