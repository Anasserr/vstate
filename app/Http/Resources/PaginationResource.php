<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PaginationResource extends JsonResource
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
                "offset"=> $this->currentPage(),
                "limit"=> (!empty($request->limit)) ? intval($request->limit) :12,
                "totalPages"=>  $this->lastPage() ,
                "nextpage" =>$this->nextPageUrl() ,
                "previousPageUrl" =>$this->previousPageUrl() ,
                'totalElement' => $this->total() ,
            ];
    }
}
