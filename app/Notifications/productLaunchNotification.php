<?php

namespace App\Notifications;


use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class productLaunchNotification extends Notification  implements ShouldQueue
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
        return ['mail','database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
  
        $url =route('productSHOW',$this->product->id);

            return (new MailMessage)
            ->subject('smart Product Launch Notice')  // Custom subject line
            ->greeting('Hello!')  // Add a greeting line
            ->line('a new '.$this->product->type?->name.' product has been launched called '.' '.$this->product->name,)
            ->action('more details',$url)
            ->line('Thanks for using our application!')  // Closing line
            ->salutation('Best regards, The SmartFurniture Team'); 
       
         }
    

    public function toDatabase()
    {
        return [
          'title'=> $this->product->name.' '.$this->product->type->name.' has been launched',
           'by' => displayCreatedBy($this->product->created_by),
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
