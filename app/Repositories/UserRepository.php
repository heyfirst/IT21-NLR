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

  public function getUserFromGoogle($id){
    $socialUser = $this->user
      ->where('social_token_id',$id)
      ->where('provider','google')
      ->get()->first();

    return $this->user->where('user_id',$socialUser['user_id'])->get()->first();
  }

  public function getUserFromEmail($email){
    return $this->user->where('email',$email)->get()->first();
  }

  public function createSocialUser($userId,$socialUserId,$provider){

    $id = $this->social_user->insertGetId([
      'user_id' => $userId,
      'social_token_id' => $socialUserId,
      'provider' => $provider,
    ]);
    
    return $id;

  }

}
