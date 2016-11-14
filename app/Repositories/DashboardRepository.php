<?php
namespace App\Repositories;

use App\Models\NL_social_user;
use App\Models\NL_section;
use App\Models\NL_enroll;

use App\Repositories\UserRepository;
use App\Repositories\SectionRepository;
use App\Repositories\BookingRepository;
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


  public function getEnrollCount()
  {
      $enrollCount = $this->enroll->get()->count();
      return $enrollCount;
  }

  public function getUserCount()
  {
    $userCount  = $this->user->get()->count();
    return $userCount;
  }

  public function getSectionCount()
  {
    $sectionCount = $this->section->get()->count();
    return $sectionCount;
  }
}
