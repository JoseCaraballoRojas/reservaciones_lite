<?php

namespace Vanguard\Console\Commands;

use Illuminate\Console\Command;

use Vanguard\Repositories\Agenda\AgendaRepository;

class NotificationsEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reminder:email';

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
    public function handle()
    {
      //$agendas = $this->agendas->getAgendaByNotificationsSms();
      //\Log::info('Log de prueba fecha: '. \Carbon\Carbon::now());
      //\Log::info(var_dump($agendas));
    }
}
