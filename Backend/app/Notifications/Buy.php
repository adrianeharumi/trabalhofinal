<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\User;
use App\Student;

class Buy extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
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
        $user = $notifiable;
        $current = $user->date;
        $student = $user->student;
        $contact = $user->contact;
        $array = [];
        $prices = $student->teachers()->where('student_id', $student->id)->get();
        foreach ($prices as $price) {
          $array[0] = $price->pivot->price;
        }
        $lol = $array[0];
        return (new MailMessage)
                    ->greeting('Sua compra foi efetuada com sucesso!')
                    ->line('Sua compra num total de R$' . $lol)
                    ->action('Clique aqui para mais detalhes', url('/showContracts'))
                    ->line('Compra efetuada em ' . $current)
                    ->line('Contate seu professor: ' . $contact)
                    ->line('Obrigado pela preferencia e volte sempre!');
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
