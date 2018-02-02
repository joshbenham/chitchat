<?php

namespace App\Listeners;

use App\Events\ThreadReceivedNewReply;
use App\User;
use App\Notifications\YouWereMentioned;

class NotifyMentionedUsers
{
    /**
     * Handle the event.
     *
     * @param  ThreadReceivedNewReply  $event
     * @return void
     */
    public function handle(ThreadReceivedNewReply $event)
    {
        $mentionedUsers = $event->reply->mentionedUsers();

        collect($event->reply->mentionedUsers())
            ->map(function ($name) {
                return User::whereName($name)->first();
            })
            ->filter()
            ->each(function ($user) use ($event) {
                $user->notify(new YouWereMentioned($event->reply));
            });
    }
}
