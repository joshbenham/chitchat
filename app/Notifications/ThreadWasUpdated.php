<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use App\Thread;
use App\Reply;

class ThreadWasUpdated extends Notification
{
    use Queueable;

    /**
     * @var Thread
     */
    protected $thread;

    /**
     * @var Reply
     */
    protected $reply;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($thread, $reply)
    {
        $this->thread = $thread;
        $this->reply = $reply;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'message' => 'Temporary placeholder.'
        ];
    }
}
