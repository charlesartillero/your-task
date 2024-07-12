<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TaskResource extends JsonResource
{

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

        return [
            "type" => "task",
            "id" => $this->id,
            "attributes" => [
                "body" => $this->body,
                "completed" => $this->completed,
                "updatedAt" => $this->updated_at,
                "createdAt" => $this->created_at
            ],
            "relationships" => [
                "author" => [
                    "data" => [
                        "type" => "user",
                        "id" => $this->user_id
                    ],
                    "links" => [
                        "self" => url("users/{$this->id}")
                    ],

                ]
            ],
            "links" => [
                "self" => url("task/{$this->id}")
            ]


        ];

    }
}
