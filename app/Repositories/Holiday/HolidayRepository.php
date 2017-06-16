<?php

namespace Vanguard\Repositories\Holiday;
use Vanguard\Holiday;
use Vanguard\Area;


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
  
  public function getAreas()
  {
    return Area::orderBy('area', 'ASC')->lists('area', 'id');
  }

}
