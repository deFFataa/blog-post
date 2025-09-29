<?php

namespace App\Observers;

use App\Models\Post;
use App\Notifications\PostNotification;

class PostObserver
{
    /**
     * Handle the Post "created" event.
     */
    public function created(Post $post): void
    {
        //
    }

    /**
     * Handle the Post "updated" event.
     */
    public function updated(Post $post): void
    {
        \Filament\Notifications\Notification::make()
            ->title('Post updated.')
            ->body('Content here')
            ->success()
            ->sendToDatabase($post->getSubscribers());

        foreach($post->getSubscribers() as $user) {
            $user->notify(new PostNotification($post));
        }
    }

    /**
     * Handle the Post "deleted" event.
     */
    public function deleted(Post $post): void
    {
        //
    }

    /**
     * Handle the Post "restored" event.
     */
    public function restored(Post $post): void
    {
        //
    }

    /**
     * Handle the Post "force deleted" event.
     */
    public function forceDeleted(Post $post): void
    {
        //
    }
}
