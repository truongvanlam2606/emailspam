<?php

namespace App\Http\Resources\Goal;

use Illuminate\Http\Resources\Json\JsonResource;

class MyGoalResource extends JsonResource
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
            'name' => optional($this->goal)->name,
            'description' => optional($this->goal)->description,
            'add_date' => $this->add_date,
        ];
    }
}
