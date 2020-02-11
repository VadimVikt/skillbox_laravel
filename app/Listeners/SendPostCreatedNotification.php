<?php

namespace App\Listeners;

use App\Events\PostCreated;
use App\Notifications\PostNewCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendPostCreatedNotification
{
     /**
     * Handle the event.
     *
     * @param  PostCreated  $event
     * @return void
     */
    public function handle(PostCreated $event)
    {
        /**
         * Код для отправки notification 2 варианта
         */

//        $event->auth()->user->notify(new PostNewCreated()); # уведомит любого зарегистр пользователя
        $event->post->owner->notify(new PostNewCreated()); # уведомит автора задачи
        /**
         * Код для отпрвки почтовой отбивки
         */
//        \Mail::to($event->post->owner->email)->send(
//            new \App\Mail\PostCreated($event->post)
//        );
    }
}
