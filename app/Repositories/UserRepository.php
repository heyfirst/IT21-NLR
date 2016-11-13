<?php
namespace App\Repositories;

use App\Models\NL_social_user;
use App\User;

class UserRepository implements UserRepositoryInterface {

  protected $social_user;
  protected $user;

  public function __construct(){
      $this->social_user = new NL_social_user();
      $this->user = new User();
  }

  public function getAllUser(){
    return $this->user->get();
  }
  
}
