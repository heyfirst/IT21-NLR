<?php
namespace App\Repositories;

use App\Models\NL_social_user;
use App\Models\NL_section;
use App\Models\NL_enroll;

use App\Repositories\UserRepository;
use App\Repositories\SectionRepository;
use App\Repositories\BookingRepository;
use App\User;

use DB;
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
    $fullSection = $this->enroll
                    ->join('nl_sections','nl_sections.section_id','=','nl_enrolls.section_id')
                    ->where('','','')
                    // ->groupBy('nl_sections.section_id')
                    // ->havingRaw('count(id) = 24')
                    // ->select('nl_sections.section_id','count(nl_sections.enrolls)')
                    ->get();
    dd($fullSection);
    $section =  $this->enroll
                  ->get();

    return $section;
  }

  public function getEnrollByUser($userId)
  {
    $enrollByUser = $this->enroll->where('id','=',$userId)->get()->count();
    return $enrollByUser;
  }

  public function getTopUser(){
    return $this->user
                ->join('nl_enrolls','nl_enrolls.id','=','users.id')
                ->groupBy('users.name')
                ->orderByRaw('count(*) desc')
                ->limit(10)
                ->selectRaw('users.name , count(*) as "count" ')
                ->get();
  }

  public function getLessUser(){
    return $this->user
                ->leftJoin('nl_enrolls','nl_enrolls.id','=','users.id')
                ->groupBy('users.name')
                ->orderByRaw('count(nl_enrolls.id) asc')
                ->limit(10)
                ->selectRaw('users.name , count(nl_enrolls.id) as "count" ')
                ->get();
  }

}
