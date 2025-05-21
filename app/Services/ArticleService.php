<?php

namespace App\Services;

use App\Models\Article;
use App\Models\User;
use Illuminate\Pagination\LengthAwarePaginator;


class ArticleService
{
    public function getAllArticles(?User $user): LengthAwarePaginator
    {
        $query = Article::query()
            ->select([
                'id',
                'title',
                'preview',
                'created_at'
            ])
            ->with(['user' => function($query) {
                $query->select('id', 'name');
            }]);

        if ($user) {
            $query->where('user_id', $user->id);
        }

        return $query->paginate(10);
    }

    public function createArticle(array $data, User $user): Article
    {
        $data['user_id'] = $user->id;
        return Article::create($data);
    }

    public function updateArticle(Article $article, array $data): Article
    {
        $article->update($data);
        return $article->fresh();
    }

    public function deleteArticle(Article $article): void
    {
        $article->delete();
    }
}
