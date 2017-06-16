<?php

namespace Vanguard\Repositories\Holiday;
use Vanguard\Holiday;


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
  

}
