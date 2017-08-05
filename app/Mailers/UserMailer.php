<?php

namespace Vanguard\Mailers;

use Vanguard\User;

class UserMailer extends AbstractMailer
{
    public function sendConfirmationEmail($user, $token)
    {
        $view = 'emails.registration.confirmation';
        $data = ['token' => $token];
        $subject = 'Registration Confirmation';

        $this->sendTo($user->email, $subject, $view, $data);
    }

    public function sendPasswordReminder(User $user, $token)
    {
        $view = 'emails.password.remind';
        $data = ['user' => $user, 'token' => $token];
        $subject = 'Password Reset Required';

        $this->sendTo($user->email, $subject, $view, $data);
    }

    public function sendConfirmationCancelCita($user, $token)
    {
        $view = 'emails.citas.cancelarCita';
        $data = ['token' => $token];
        $subject = 'Confirmacion de Cancelacion de cita';

        $this->sendTo($user->email, $subject, $view, $data);
    }

    //function by Send appointment notification
    public function SendAppointmentNotification($emails, $dias , $fecha)
    {
        $view = 'emails.citas.notification';
        $data = ['fecha' => $fecha, 'dias' => $dias];
        $subject = 'reservacion pendiente en : '.$dias.' dias';

        foreach ($emails as $email) {

            $this->sendTo($email->email, $subject, $view, $data);

        }

    }
}
