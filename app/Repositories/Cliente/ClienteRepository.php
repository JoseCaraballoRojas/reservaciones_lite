<?php

namespace Vanguard\Repositories\Cliente;
use Vanguard\User;
use Vanguard\Role;
/**
 * Repository Cliente
 */
class ClienteRepository
{
  /**
   * @var RoleRepository
   */
/*  private $roles;

  public function __construct(RoleRepository $roles)
  {

      $this->roles = $roles;
  }
*/
  public function getClientes()
  {
    return User::where('id', $id)->get();
    return User::orderBy('username', 'ASC')->lists('username', 'id');
  }

  public function getUsersWithRole($roleName)
  {
      return Role::where('name', $roleName)
          ->first()
          ->users;
  }


  public function getSucursalesByID($id)
  {
      return Sucursal::where('empresa_id', '=',$id)->lists('sucursal','id');
  }
}
