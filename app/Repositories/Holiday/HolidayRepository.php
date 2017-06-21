<?php

namespace Vanguard\Repositories\Holiday;
use Vanguard\Holiday;
use Vanguard\Area;
use Vanguard\Empresa;


/**
 *Repositorios para el modelo Holiday
 */
class HolidayRepository
{

  public function create(array $data)
  {

      return Holiday::create($data);
  }

  public function index()
  {
      return Holiday::orderBy('id', 'DESC')->paginate(10);
  }

  public function findHolidayByID($id)
  {
      return Holiday::find($id);
  }

  public function getAreas()
  {
    return Area::orderBy('area', 'ASC')->lists('area', 'id');
  }

  public function getEmpresas()
  {
    return Empresa::orderBy('nombre', 'ASC')->lists('nombre', 'id');
  }
}
