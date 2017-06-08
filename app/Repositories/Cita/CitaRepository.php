<?php

namespace Vanguard\Repositories\Cita;
use Vanguard\User;
use Vanguard\Area;
use Vanguard\Empresa;
use Vanguard\Sucursal;
use Vanguard\Cita;

/**
 *Repositorios para el modelo Cita
 */
class CitaRepository
{

  public function create(array $data)
  {
      $cita = Cita::create($data);

      return $cita;
  }

  public function getAppointmentsByID($id)
  {
    return Cita::where('cliente_id', '=',$id)
    ->get();

  }

  public function findAppointmentByID($id)
  {
    return Cita::where('id', '=',$id)
    ->get();

  }

  public function findCitaByID($id)
  {
    return Cita::find($id);

  }

  public function getCitasByAgendaAndDay($datos)
  {
    return Cita::where('agenda_id','=',$datos->idAgenda)
                 ->where('appointment_date','=',$datos->fecha)->get();
  }

}
