<?php

namespace App\Http\Resources\Collections;

use Illuminate\Http\Resources\Json\ResourceCollection;

class BrandCollection extends ResourceCollection
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
            "data" => $this->collection,
            "pagination" => [
                "total" =>  $this->total(),
                "count" =>  $this->count(),
                "per_page" => $this->perPage(),
                "current_page" => $this->currentPage(),
                "path" =>  $this->path(),
                "totalPages" => $this->lastPage(),
                'prev'  => $this->previousPageUrl(),
                'next'  => $this->nextPageUrl(),
            ]
        ];
    }
}
