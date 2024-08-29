<?php

namespace App\Notifications;

use App\Models\Admin;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class productOfferLaunchNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    private $offer;
    public function __construct($offer)
    {
     $this->offer =$offer;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via()
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    // public function toMail(object $notifiable): MailMessage
    // {
    //     return (new MailMessage)
    //                 ->line('The introduction to the notification.')
    //                 ->action('Notification Action', url('/'))
    //                 ->line('Thank you for using our application!');
    // }

    public function toDatabase()
    {
         $user = Admin::FindOrFail(filter_var($this->offer->created_by, FILTER_SANITIZE_NUMBER_INT));
        return [
          'title'=>  'new offer has been launched '.$this->offer->name,
           'by' => $user->name,
           'image'=>$user->getFirstMediaUrl('profile'),
           'id' =>$this->offer->id,
           'url' => route('offers.index'),
          'created_at' => $this->offer->created_at,
        ];
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
