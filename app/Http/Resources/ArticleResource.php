<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ArticleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'title' => $this->title,
            'preview' => $this->preview,
            'content' => $this->when(
                $request->routeIs('articles.show'),
                $this->content
            ),
            'created_at' => $this->created_at->format('d.m.Y H:i'),
            'links' => [
                'self' => route('articles.show', $this->id),
            ]
        ];
    }
}
