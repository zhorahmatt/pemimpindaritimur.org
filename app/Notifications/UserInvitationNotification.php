<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UserInvitationNotification extends Notification
{
    use Queueable;

    public function __construct(public string $acceptUrl, public string $role) {}

    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Undangan Akses Yayasan Pemimpin dari Timur')
            ->greeting('Halo, '.$notifiable->name.'!')
            ->line('Anda diundang untuk mengakses sistem internal Yayasan Pemimpin dari Timur dengan peran '.$this->role.'.')
            ->action('Terima Undangan', $this->acceptUrl)
            ->line('Tautan ini berlaku selama periode undangan yang ditentukan dan hanya dapat digunakan satu kali.');
    }
}
