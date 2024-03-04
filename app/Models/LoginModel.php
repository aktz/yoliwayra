<?php

namespace App\Models;

use CodeIgniter\Model;

class LoginModel extends Model
{
  protected $table = 'users';
  protected $primaryKey = 'id';
  protected $useAutoIncrement = true;

  protected $returnType = 'array';
  protected $allowedFields = [
    'profile', 'name', 'email', 'phone', 'nick', 'password', 'slogan', 'creation_counter', 
    'likes_counter', 'user_country', 'active'
  ];

  protected $useTimestamps = false;
  protected $useSoftDeletes = false;

  public function validate_user($nick, $pass) {
    return $this->query("select usr.id, usr.profile, usr.name, usr.email, usr.phone, usr.slogan, 
                          usr.creation_counter, usr.likes_counter, usr.user_country, pro.id as profile_id, 
                          pro.description as profile, pro.create, pro.update, pro.delete, pro.approve
                          from users usr inner join profiles pro on usr.profile = pro.id
                          where usr.nick = '" . $nick. "' and usr.password = '" . $pass . "'")->getRow();
  }
}