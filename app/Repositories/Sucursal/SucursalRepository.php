<?php

namespace Vanguard\Repositories\Sucursal;
use Vanguard\User;
use Vanguard\Sucursal;
use Vanguard\Empresa;
/**
 *
 */
class SucursalRepository
{
  public function getUsers()
  {
    return User::orderBy('username', 'ASC')->lists('username', 'id');
  }

  public function getEmpresas()
  {
    return Empresa::orderBy('nombre', 'ASC')->lists('nombre', 'id');
  }

  public function create(array $data)
  {
      return Sucursal::create($data);
  }

  public function index()
  {
      return Sucursal::orderBy('id', 'DESC')->paginate(10);
  }

  public function findUser($id)
  {
      return User::where('id', $id)->get();
  }

  public function getSucursalesByID($id)
  {
      return Sucursal::where('empresa_id', '=',$id)->lists('sucursal','id');
  }

  public function findSucursalByID($id)
  {
      return Sucursal::find($id);
  }
}
