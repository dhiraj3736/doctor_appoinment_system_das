<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class Booknotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public $name;
    public $doctor;

    public $b_id;
    public function __construct($name,$doctor=null,$b_id=null)
    {
        $this->name=$name;

        $this->doctor=$doctor;
        $this->b_id=$b_id;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'name'=>$this->name,
            'doctor'=>$this->doctor,
            'b_id'=>$this->b_id
        ];
    }
}
