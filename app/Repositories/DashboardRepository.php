<?php
namespace App\Repositories;

use App\Models\NL_social_user;
use App\Models\NL_section;
use App\Models\NL_enroll;

use App\User;

class DashboardRepository implements DashboardRepositoryInterface {

  protected $social_user;
  protected $user;
  protected $enroll;
  protected $section;

  public function __construct(){
      $this->user = new User();
      $this->social_user = new NL_social_user();
      $this->enroll = new NL_enrolls();
      $this->section = new NL_section();
  }

  
}
