<?php

namespace Vanguard\Repositories\Reason;

use Vanguard\Reason;
/**
 *Repositories for Reasons
 */
class ReasonRepository
{

  public function create(array $data)
  {
      return Reason::create($data);
  }


  public function getReasons($perPage)
  {
      $query = Reason::query();

      $reasons = $query->paginate($perPage);

      return $reasons;

  }

  public function findReasonByID($id)
  {
      return $reason = Reason::find($id);
  }

  public function update($id, array $data)
  {
      return $this->find($id)->update($data);
  }

  public function delete($id)
  {
      $reason = $this->find($id);

      return $reason;
  }

}
