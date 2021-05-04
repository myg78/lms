<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TestFullResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'type' => $this->type,
            'time_limit_in_seconds' => $this->time_limit_in_seconds,
            'start_date' => date('Y-m-d\TH:i:s\Z', strtotime($this->start_date)),
            'due_date' => date('Y-m-d\TH:i:s\Z', strtotime($this->due_date)),
            'content' => json_decode($this->content),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
