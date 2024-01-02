<?php

namespace App\Notifications;

use App\Models\Product;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class productLaunchNotification extends Notification
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
    //                 ->line('a new '.$this->product->type->name.' product has been launched called'.' '.$this->product->name.' '.'from'.' '.$this->product->source->source_name,)
    //                 ->action('more details', route('productSHOW',$this->product->id))
    //                 ->line('Thank ');
    // }

    public function toDatabase()
    {
        return [
          'title'=> $this->product->name.' '.$this->product->type->name.' has been launched'.' '.'from'.' '.$this->product->source->name,
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
