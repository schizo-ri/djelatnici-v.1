<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\Models\Users;

class Rodjendan extends Notification// implements ShouldQueue
{
   // use Queueable;
	
	protected $rodjendan;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Users $rodjendan)
    {
        $this->rodjendan = $rodjendan;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
		//$url = url('/invoice/'.$this->invoice->id);
        return (new MailMessage)
					->subject('Rođendan djelatnika')
					//->greeting('Pozdrav!')
                    ->line('Djelatnik danas ima rođendan.')
					->action('Notification Action', url('/'))
                    ->line('...');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
       //
    }
}
