<?php

namespace App\Notifications;

use App\Models\Appointment;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AppointmentBooked extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * The appointment instance.
     *
     * @var Appointment
     */
    protected $appointment;

    /**
     * Create a new notification instance.
     *
     * @param  Appointment  $appointment
     * @return void
     */


    public function __construct(Appointment $appointment)
    {
        $this->appointment = $appointment;
    }


    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array<int, string>
     */
    public function via( $notifiable): array
    {
        return ['mail'];
    }

  
    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return MailMessage
     */

    public function toMail( $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Appointment Booked')
            ->greeting('Hello!')
            ->line('You have a new appointment scheduled.')
            ->line('Patient: ' . $this->appointment->patient->user->name)
            ->line('Doctor: ' . $this->appointment->doctor->user->name)
            ->line('Date: ' . $this->appointment->date)
            ->line('Start Time: ' . $this->appointment->start_time)
            ->line('End Time: ' . $this->appointment->end_time)            ->action('View Appointment', url('/appointments/' . $this->appointment->id))
            ->action('View Appointment', url('/appointments/' . $this->appointment->id))
            ->line('Please be on time as per the schedule. Thank You!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'appointment_id' => $this->appointment->id,
            'date' => $this->appointment->date,
            'time' => $this->appointment->time,
            'patient_name' => $this->appointment->patient->user->name,
            'doctor_name' => $this->appointment->doctor->user->name,
        ];
    }
}
