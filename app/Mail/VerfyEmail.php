<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\User; 
use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\Messages\MailMessage;
class VerfyEmail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;
    public $user; 
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        $this->user = $user; 
        $this->onQueue("send-mail");
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from("silkroad-support@silkroad.ml","website")
        ->subject("Silk Road Market")
        ->markdown('emails.VerfyEmail')
        ->with(["url"=> "https://www.dfinance.site"]); 
        // return $this->html(new mailMessage)
        // // ->greeting("Welcome to our SilkRoad")
        // ->line("new user #102")
        // ->action("Join to Website", "https://www.dfinance.site")
        // ->render();
    }
}
