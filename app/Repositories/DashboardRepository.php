<?php
namespace App\Repositories;

use App\Models\NL_social_user;
use App\Models\NL_section;
use App\Models\NL_enroll;

use App\Repositories\UserRepository;
use App\Repositories\SectionRepository;
use App\Repositories\BookingRepository;
use App\User;

use Carbon\Carbon;

class DashboardRepository implements DashboardRepositoryInterface {

  protected $social_user;
  protected $user;
  protected $enroll;
  protected $section;

  public function __construct(){
      $this->user = new User();
      $this->social_user = new NL_social_user();
      $this->enroll = new NL_enroll();
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

  public function getHotSection()
  {
    $fullSection = $this->enroll->groupBy('section_id')->having('id', '=', 24)->get();
    array_add($fullSectionId,['id' => $fullSection]);

    $firstEnroll = new Carbon();
    $lastEnroll = new Carbon();
    $diff = $lastEnroll->dif($firstEnroll);
  }

  public function getEnrollByUser($userId)
  {
    $enrollByUser = $this->enroll->where('id','=',$userId)->get()->count();
    return $enrollByUser;
  }

  public function getUserEnrollTimes()
  {
    //SELECT id, count(enroll_id) as time  FROM `nl_enrolls` GROUP by id ORDER by time desc;
    $userEnrollTimes =  $this->enroll->SELECT('id','count(enroll_id) as time')->groupBy('id')->orderBy('time', 'desc')->get();
    return $userEnrollTimes;
  }
}
