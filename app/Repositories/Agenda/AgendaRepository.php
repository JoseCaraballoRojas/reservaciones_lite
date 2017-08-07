<?php

namespace Vanguard\Repositories\Agenda;
use Vanguard\User;
use Vanguard\Area;
use Vanguard\Empresa;
use Vanguard\Sucursal;
use Vanguard\Agenda;
use Vanguard\Reason;
use Vanguard\Cita;
use DB;
use Carbon\Carbon;
/**
 *Repositorios para el modelo Agenda
 */
class AgendaRepository
{
    public function getUsers()
    {
      return User::orderBy('username', 'ASC')->lists('username', 'id');
    }

    public function getReasons()
    {
      return Reason::orderBy('reason', 'ASC')->lists('reason', 'id');
    }

    public function create(array $data)
    {
        $agenda = Agenda::create($data);

        return $agenda;
    }

    public function findUser($id)
    {
        return User::where('id', $id)->get();
    }

    public function getEmpresas()
    {
      return Empresa::orderBy('nombre', 'ASC')->lists('nombre', 'id');
    }


    public function getAgendasByID($id)
    {
        return Agenda::where('area_id', '=',$id)
        ->get();
    }

    public function getAgendaByID($id)
    {
        return Agenda::where('id', '=',$id)
        ->get();
    }

    public function findAgendaByID($id)
    {
        return $agenda = Agenda::find($id);
    }

    public function getAgendas()
    {
        return $agendas = Agenda::orderBy('id', 'DESC')->paginate(5);
    }

    public function getCitasAgendaByID($id)
    {
        return Cita::where('agenda_id', '=',$id)->paginate(5);

    }

    public function getAgendaByResponsableID($id)
    {
        return Agenda::where('responsable_id', '=',$id)->paginate(7);

    }

    public function getAgendaByNotificationsSms()
    {
        $date = Carbon::now();
        $date = $date->addDay(1);
        $date = $date->format('Y-m-d');

        return DB::table('users')
            ->join('appointments', 'users.id', '=', 'appointments.cliente_id')
            ->join('agendas', 'agendas.id', '=', 'appointments.agenda_id')
            ->select('users.phone')
            ->where('agendas.notifications_sms', '=', '1')
            ->where('appointments.appointment_date', '=', $date)
            ->get();

    }

    //Function to search for user emails that your appointment is within five days
    public function getEmailsUserFiveDaysBeforeAppointment()
    {
        $date = Carbon::now();
        $date = $date->addDay(5);
        $date = $date->format('Y-m-d');

        return DB::table('users')
            ->join('appointments', 'users.id', '=', 'appointments.cliente_id')
            ->join('agendas', 'agendas.id', '=', 'appointments.agenda_id')
            ->select('users.email')
            ->where('agendas.notifications_email', '=', '1')
            ->where('appointments.appointment_date', '=', $date)
            ->where('appointments.appointment_status', '=', 'aprobada')
            ->get();

    }

    //Function to search for user emails that your appointment is within three days
    public function getEmailsUserThreeDaysBeforeAppointment()
    {
        $date = Carbon::now();
        $date = $date->addDay(3);
        $date = $date->format('Y-m-d');

        return DB::table('users')
            ->join('appointments', 'users.id', '=', 'appointments.cliente_id')
            ->join('agendas', 'agendas.id', '=', 'appointments.agenda_id')
            ->select('users.email')
            ->where('agendas.notifications_email', '=', '1')
            ->where('appointments.appointment_date', '=', $date)
            ->where('appointments.appointment_status', '=', 'aprobada')
            ->get();

    }

    //Function to search for user emails one day before your appointment
    public function getEmailsUserOneDaysBeforeAppointment()
    {
        $date = Carbon::now();
        $date = $date->addDay(1);
        $date = $date->format('Y-m-d');

        return DB::table('users')
            ->join('appointments', 'users.id', '=', 'appointments.cliente_id')
            ->join('agendas', 'agendas.id', '=', 'appointments.agenda_id')
            ->select('users.email')
            ->where('agendas.notifications_email', '=', '1')
            ->where('appointments.appointment_date', '=', $date)
            ->where('appointments.appointment_status', '=', 'aprobada')
            ->get();

    }

    //Function to search for user emails on the day of your appointment
    public function getEmailsUserOnTheDayAppointment()
    {
        $date = Carbon::now();
        $date = $date->format('Y-m-d');

        return DB::table('users')
            ->join('appointments', 'users.id', '=', 'appointments.cliente_id')
            ->join('agendas', 'agendas.id', '=', 'appointments.agenda_id')
            ->select('users.email')
            ->where('agendas.notifications_email', '=', '1')
            ->where('appointments.appointment_date', '=', $date)
            ->where('appointments.appointment_status', '=', 'aprobada')
            ->get();

    }

}
