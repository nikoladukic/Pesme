<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\KategorijaResource;
use App\Http\Resources\UserResource;
use App\Http\Resources\IzvodjacResource;

class PesmaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'name'=>$this->resource->name,
            'publishinghouse'=>$this->resource->publishinghouse,
            'duration'=>$this->resource->duration,
            'category'=>new KategorijaResource($this->resource->kategorija),
            'author'=>new IzvodjacResource($this->resource->izvodjac),
            'user'=>new UserResource($this->resource->user)
        ];
    }
}
