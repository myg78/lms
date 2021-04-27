<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TestResource extends JsonResource
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
            'title' => $this->title,
            'description' => $this->description,
            'type' => $this->type,
            'time_limit_in_seconds' => $this->time_limit_in_seconds,
            'start_date' => $this->start_date,
            'due_date' => $this->due_date,
        ];
    }
}
