<?php

namespace app\models;

use app\libraries\Model;
use PDO;
use stdClass;

class User extends Model
{
  protected string $table = 'users';

  public function register(array $data) : bool
  {
      $this->db->query('INSERT INTO users (name, email, password, created_at) VALUES (:name, :email, :password, :created_at)');

      $this->db->bind(':name', $data['name'],);
      $this->db->bind(':email', $data['email']);
      $this->db->bind(':password', $data['password']);
      $this->db->bind(':created_at', date('Y-m-d H:i:s'));

      return ($this->db->execute());
  }

  public function hasEmail(string $email) : bool
  {
      $this->db->query('SELECT * FROM '.$this->table.' WHERE email = :email ');
      $this->db->bind(':email', $email);

      $this->db->single();

      return ($this->db->rowCount() > 0);
  }

  public function login(string $email, string $password) : ?stdClass
  {
      $this->db->query('SELECT * FROM '.$this->table.' WHERE email = :email');
      $this->db->bind(':email', $email);

      $row = $this->db->single();

      $hased_password = $row->password;

      if (password_verify($password, $hased_password)) {
          return $row;
      }

      return null;
  }

    public function getUserById(string $id) : stdClass
    {
        $this->db->query("SELECT * FROM ".$this->table." WHERE id = :id");
        $this->db->bind(':id', $id);

        return $this->db->single();
    }
}