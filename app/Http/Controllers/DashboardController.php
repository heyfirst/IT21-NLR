<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;
use Auth;

class DashboardController extends MainController
{


  protected $SectionRepository;
  protected $UserRepository;
  protected $EnrollRepository;

  public function __construct(DashboardRepositoryInterface $DashboardRepository)
  {
    parent::__construct();
    $this->DashboardRepository = $DashboardRepository;

  }

  public function index()
  {
    $section = $this->BookingRepository->getSection($section);
    $enroll = $this->DashboardRepository->getEnrollCount();
    $content = array(
      'section' => $section,
      'enroll' => $enroll,
      'user' => Auth::user()
    );

    return view('pages.dashboard',$content);
  }
}
