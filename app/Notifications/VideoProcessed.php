<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Video;

class VideoProcessed extends Notification implements ShouldQueue
{
    use Queueable;
    protected $video; 
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(string $video)
    {
        $this->video = $video;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
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
                    ->line('سلام کاربر عزیز, از اعتماد شما سپاسگذاریم.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!')
                    ->line($video);
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
            "video_name" => $this->video->name,
            "url" => $this->video->url
        ];
    }
}
