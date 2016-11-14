<?php

namespace App\Http\Controllers;


use App\Repositories\DashboardRepositoryInterface;
use App\Repositories\BookingRepositoryInterface;
use App\Repositories\SectionRepositoryInterface;

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
    $sectionCount = $this->DashboardRepository->getSectionCount();
    $enrollCount = $this->DashboardRepository->getEnrollCount();
    $userCount = $this->DashboardRepository->getUserCount();

    $content = array(
      'sectionCount' => $sectionCount,
      'enrollCount' => $enrollCount,
      'userCount' => $userCount,
      'user' => Auth::user()
    );

    return view('pages.dashboard',$content);
  }

    public function indexByUser()
    {
      return view('pages.dashboard');
    }

}
