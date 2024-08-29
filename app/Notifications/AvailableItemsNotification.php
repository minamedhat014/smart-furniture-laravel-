<?php

namespace App\Notifications;

use App\Models\Admin;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class AvailableItemsNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    private $item;
    public function __construct($item)
    {
     $this->item =$item;
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

     

   

    public function toDatabase()
    {
        if($this->item->created_by){
        $user = Admin::FindOrFail(filter_var($this->item->created_by, FILTER_SANITIZE_NUMBER_INT));
        }
       
        return [
          'title'=>'available items has been changed',
           'by' =>'',
           'image'=>" ",
           'id' =>$this->item->id,
           'url' => route('avilableItems'),
          'created_at' => $this->item->created_at,
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
