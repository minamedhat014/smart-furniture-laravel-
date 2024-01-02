<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ProductPriceNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    private $product;
    public function __construct($product)
    {
     $this->product =$product;
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
        return [
          'title'=> $this->product->name.' ' .' price has been Updated',
           'by' => $this->product->created_by,
           'image'=>$this->product->getFirstMediaUrl('products','thumb'),
           'id' =>$this->product->id,
           'url' => route('productSHOW',$this->product->id),
          'created_at' => $this->product->created_at,
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
