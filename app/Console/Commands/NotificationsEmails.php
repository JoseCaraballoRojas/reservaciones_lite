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
            /*foreach ($listEmailsByFiveDays as $list) {

            }*/
            //dd($listEmailsByFiveDays);

      }

      if ($listEmailsByThreeDays) {
            dd($listEmailsByThreeDays);
      }

      if ($listEmailsByOneDays) {
            dd($listEmailsByOneDays);
      }

      if ($listEmailsByOnTheDays) {
            dd($listEmailsByOnTheDays);
      }


      //\Log::info('Log de prueba fecha: '. $agendas);
      //\Log::info(var_dump($agendas));
    }
}
