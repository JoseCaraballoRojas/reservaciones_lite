<?php

namespace Vanguard\Console\Commands;

use Illuminate\Console\Command;

use Vanguard\Repositories\Agenda\AgendaRepository;

use Vanguard\Mailers\UserMailer;
use Carbon\Carbon;

class NotificationsEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reminder:email';
    protected $mailer;
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send appointment notifications to customers by emails';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(AgendaRepository $agendas)
    {
        parent::__construct();
        $this->agendas = $agendas;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle(UserMailer $mailer)
    {
      $listEmailsByFiveDays = $this->agendas->getEmailsUserFiveDaysBeforeAppointment();

      $listEmailsByThreeDays = $this->agendas->getEmailsUserThreeDaysBeforeAppointment();

      $listEmailsByOneDays = $this->agendas->getEmailsUserOneDaysBeforeAppointment();

      $listEmailsByOnTheDays = $this->agendas->getEmailsUserOnTheDayAppointment();

      if ($listEmailsByFiveDays) {

            $dias = 5;
            $fecha = Carbon::now();
            $fecha = $fecha->addDay(5);
            $fecha = $fecha->format('Y-m-d');
            $emails = $listEmailsByFiveDays;

            $mailer->SendAppointmentNotification($emails, $dias, $fecha);
      }

      if ($listEmailsByThreeDays) {

            $dias = 3;
            $fecha = Carbon::now();
            $fecha = $fecha->addDay(3);
            $fecha = $fecha->format('Y-m-d');
            $emails = $listEmailsByThreeDays;

            $mailer->SendAppointmentNotification($emails, $dias, $fecha);

      }

      if ($listEmailsByOneDays) {

            $dias = 1;
            $fecha = Carbon::now();
            $fecha = $fecha->addDay(1);
            $fecha = $fecha->format('Y-m-d');
            $emails = $listEmailsByOneDays;

            $mailer->SendAppointmentNotification($emails, $dias, $fecha);

      }

      if ($listEmailsByOnTheDays) {

          $dias = "hoy";
          $fecha = Carbon::now();
          $fecha = $fecha->format('Y-m-d');
          $emails = $listEmailsByOnTheDays;

          $mailer->SendAppointmentNotification($emails, $dias, $fecha);

      }

      //\Log::info('Log de prueba fecha: '. $agendas);
      //\Log::info(var_dump($agendas));
    }
}
