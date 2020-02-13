<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\NexmoMessage;


class NewAnswerSubmitted extends Notification
{
    use Queueable;
    public $question;
    public $answer;
    public $name;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($answer,$question,$name)
    {   
        $this->question= $question;
        $this->answer=$answer;
        $this->name=$name;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail','nexmo'];
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
                    ->line('il ya une nouvelle reponse a votre question.')
                    ->line("$this->name viens juste de suggerer".$this->answer->content)
                    ->action('voir toutes les reponce ici ', route('questions.show',$this->question->id))
                    ->line('Thank you for using LaravelAnswer!');
    }

    public function toNexmo($notifiable){
        return (new NexmoMessage)
                ->content("$this->name vien juste de repondre a votre question la reponse"."".$this->answer->content.""."allez sur laravelAnswer pour la consulter")
                ->from('Orange Money');
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
            //
        ];
    }
}
