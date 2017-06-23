<?php

namespace Vanguard\Repositories\Area;
use Vanguard\User;
use Vanguard\Sucursal;
use Vanguard\Area;

/**
 *Repositorios para el modelo Area
 */
class AreaRepository
{
    
    public function getUsers()
    {
        return User::orderBy('username', 'ASC')->lists('username', 'id');
    }

    public function index()
    {
        return Area::orderBy('id', 'DESC')->paginate(10);
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

    public function  findAreayByID($id)
    {
        return Area::find($id);
    }
   
}
