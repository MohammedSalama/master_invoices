<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;
use App\Models\Invoices;

class Add_invoice_new extends Notification
{
    use Queueable;
    private $invoices;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Invoices $invoices)
    {
        $this ->Invoices = $invoices;
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

    public function toDatabase($notifiable)
    {
        return [
            //'data' => $this->details['body']
            'id' => $this->Invoices->id,
            'title' => 'New invoice added by :',
            'user' => Auth::user()->name,
        ];
    }
}
