<?php

namespace App\Http\Resources\Feature;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UsedFeatureResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'feature_id' => $this->feature_id,
            'feature' => $this->feature ?? null,
            'credits' => $this->credits,
            'data' => $this->data,
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
        ];
    }
}
