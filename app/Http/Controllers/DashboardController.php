<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

use App\Repositories\BookingRepositoryInterface;
use App\Repositories\SectionRepositoryInterface;

class DashboardController extends MainController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(BookingRepositoryInterface $BookingRepository,SectionRepositoryInterface $SectionRepository)
    {
      parent::__construct();
      $this->SectionRepository = $SectionRepository;
      $this->BookingRepository = $BookingRepository;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $section = $this->BookingRepository->getSection(15);

      array_add($section,'enroll',[
      '1' => $this->SectionRepository->getCountEnrollBySection($section['section_id'],1),
      '2' => $this->SectionRepository->getCountEnrollBySection($section['section_id'],2),
      '3' => $this->SectionRepository->getCountEnrollBySection($section['section_id'],3),
      '4' => $this->SectionRepository->getCountEnrollBySection($section['section_id'],4),
      '5' => $this->SectionRepository->getCountEnrollBySection($section['section_id'],5),
      '6' => $this->SectionRepository->getCountEnrollBySection($section['section_id'],6),
      '7' => $this->SectionRepository->getCountEnrollBySection($section['section_id'],7),
      '8' => $this->SectionRepository->getCountEnrollBySection($section['section_id'],8),
      ]);

      $content = array(
        'section' => $section
      );
      return view('pages.dashboard',$content);
    }

    public function indexByUser()
    {
      return view('pages.dashboard');
    }
}
