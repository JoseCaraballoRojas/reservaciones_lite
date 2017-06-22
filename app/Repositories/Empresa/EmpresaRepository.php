<?php

namespace Vanguard\Repositories\Empresa;
use Vanguard\User;
use Vanguard\Empresa;
/**
 *
 */
class EmpresaRepository
{
  public function getUsers()
  {
    return User::orderBy('username', 'ASC')->lists('username', 'id');
  }

  public function create(array $data)
  {
      return Empresa::create($data);
  }

  public function index()
  {
      return Empresa::orderBy('id', 'DESC')->paginate(10);
  }

  public function findUser($id)
  {
      return User::where('id', $id)->get();
  }

  public function findEmpresayByID($id)
  {
      return Empresa::find($id);
  }
}
