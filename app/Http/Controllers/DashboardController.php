<?php

namespace App\Http\Controllers;

use App\Repositories\BookingRepositoryInterface;
use Illuminate\Http\Request;
use Auth;

class DashboardController extends MainController
{

  protected $SectionRepository;
  protected $UserRepository;
  protected $EnrollRepository;

  public function __construct(SectionRepositoryInterface $SectionRepository , UserRepositoryInterface $UserRepository , EnrollRepositoryInterface $EnrollRepository)
  {
    parent::__construct();
    $this->SectionRepository = $SectionRepository;
    $this->UserRepository = $UserRepository;
    $this->EnrollRepository = $EnrollRepository;

  }

  public function index()
  {
    $section = $this->BookingRepository->getSection($section);

    $content = array(
      'section' => $section,
      'user' => Auth::user()
    );

    return view('pages.******',$content);
  }

}
