<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class productCancelNotification extends Notification implements ShouldQueue
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
       // Generate the URL for the product details page
    $url = route('productSHOW', $this->product->id);

    // Return a new mail message
    return (new MailMessage)
        ->subject('smart Product Cancellation Notice')  // Custom subject line
        ->greeting('Hello!')  // Add a greeting line
        ->line($this->product->name . ' (' . $this->product->type->name . ') has been cancelled.')
        ->action('More Details', $url)  // Provide action with the URL to product details
        ->line('Thanks for using our application!')  // Closing line
        ->salutation('Best regards, The SmartFurniture Team'); 
   
     }
     

   

    public function toDatabase()
    {
        return [
          'title'=> $this->product->name .' '.$this->product->type->name.' has been cancelled ',
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
