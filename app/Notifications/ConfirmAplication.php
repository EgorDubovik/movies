<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ConfirmAplication extends Notification
{
    use Queueable;

    private $deal_id;
    private $sender_id;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($deal_id, $sender_id)
    {
        $this->sender_id = $sender_id;
        $this->deal_id = $deal_id;
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
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
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
            'url' => '/deal/'.$this->deal_id,
            'subject' => 'Confirm your application',
            'icon' => 'fe fe-mail',
            'sender_id' => $this->sender_id,
        ];
    }
}
