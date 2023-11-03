<?php

namespace App\Http\Resources\Survey;

use App\Http\Resources\Question\QuestionResource;
use Illuminate\Http\Resources\Json\JsonResource;

class SurveyDetailResource extends JsonResource
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
            'order' => $this->order,
            'intro_text' => $this->intro_text,
            'title' => $this->title,
            'background' => $this->background,
            'questions' => QuestionResource::collection($this->whenLoaded('questions')),
        ];
    }
}
