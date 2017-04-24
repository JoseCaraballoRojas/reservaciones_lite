<?php

namespace Vanguard\Repositories\Agenda;
use Vanguard\User;
use Vanguard\Area;
use Vanguard\Empresa;
use Vanguard\Sucursal;
/**
 *Repositorios para el modelo Area
 */
class AgendaRepository
{
    public function getUsers()
    {
      return User::orderBy('username', 'ASC')->lists('username', 'id');
    }


    public function create(array $data)
    {
        return Agenda::create($data);
    }

    public function findUser($id)
    {
        return User::where('id', $id)->get();
    }

    public function getEmpresas()
    {
      return Empresa::orderBy('nombre', 'ASC')->lists('nombre', 'id');
    }

    public function getSucursalesByID($id)
    {
        return Sucursal::where('empresa_id', '=',$id)
        ->get();
    }

}
