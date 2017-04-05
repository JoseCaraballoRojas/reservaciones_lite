<?php

namespace Vanguard\Repositories\Area;
use Vanguard\User;
use Vanguard\Sucursal;

/**
 *Repositorios para el modelo Area
 */
class AreaRepository
{
    public function getUsers()
    {
      return User::orderBy('username', 'ASC')->lists('username', 'id');
    }

    public function getSucursales()
    {
      return Sucursal::orderBy('sucursal', 'ASC')->lists('sucursal', 'id');
    }

    public function create(array $data)
    {
        return Area::create($data);
    }

    public function findUser($id)
    {
        return User::where('id', $id)->get();
    }
}
