<?php

namespace App\Models;

use App\Libraries\Model;

class User extends App\Libraries\Model
{
  protected string $table = 'users';

  public function hasEmail(string $email) : bool
  {
      $this->db->query('SELECT * FROM '.$this->table.' WHERE email = :email ');
      $this->db->bind(':email', $email);

      $row = $this->db->single();

      return ($this->db->rowCount() > 0);
  }
}