<?php

namespace Vanguard\Repositories\Agenda;
use Vanguard\User;
use Vanguard\Area;
use Vanguard\Empresa;
use Vanguard\Sucursal;
use Vanguard\Agenda;
use Vanguard\Reason;
use Vanguard\Cita;
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

    public function getSucursales()
    {
      return Sucursal::orderBy('sucursal', 'ASC')->lists('sucursal', 'id');
    }

    public function getSucursalesByID($id)
    {
        return Sucursal::where('empresa_id', '=',$id)
        ->get();
    }

    public function getAreas()
    {
      return Area::orderBy('area', 'ASC')->lists('area', 'id');
    }

    public function getAreasByID($id)
    {
        return Area::where('sucursal_id', '=',$id)
        ->get();
    }

    public function getAgendasByID($id)
    {
        return Agenda::where('area_id', '=',$id)
        ->get();
    }
    
    public function getSucursalByID($id)
    {
        return Sucursal::where('id', '=',$id)
        ->get()->lists('empresa_id');
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

}
