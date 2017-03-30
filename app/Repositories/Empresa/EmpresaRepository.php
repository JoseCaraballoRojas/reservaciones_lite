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

}
