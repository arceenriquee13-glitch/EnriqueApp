<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\Article;
use Authorization\IdentityInterface;

class ArticlePolicy
{
    public function canAdd(IdentityInterface $user, Article $article): bool
    {
        return true;
    }

    public function canEdit(IdentityInterface $user, Article $article): bool
    {
        return $this->isAuthor($user, $article);
    }

    public function canDelete(IdentityInterface $user, Article $article): bool
    {
        return $this->isAuthor($user, $article);
    }

    protected function isAuthor(IdentityInterface $user, Article $article): bool
    {
        $identity = $user->getOriginalData();

        if (is_array($identity)) {
            $userId = $identity['id'] ?? null;
        } else {
            $userId = $identity->id ?? null;
        }

        if ($userId === null || $article->user_id === null) {
            return false;
        }

        return (int)$article->user_id === (int)$userId;
    }
}