<?php

namespace App\Http\Controllers;

use App\Repositories\SectionRepositoryInterface;
use Auth;
use Illuminate\Http\Request;

class ReserveController extends MainController
{

  protected $SectionRepository;

  public function __construct(SectionRepositoryInterface $SectionRepository)
  {
    parent::__construct();
    $this->SectionRepository = $SectionRepository;
  }

  public function index()
  {
    $user = Auth::user();

    $sections = $this->SectionRepository->getSection();

    foreach ($sections as $section) {
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

      array_add($section,'remain',$this->SectionRepository->getSectionRemain($section['section_id']));
      array_add($section,'youarein',$this->SectionRepository->checkYouAreIn($section['section_id'],$user));
    }


    $content = array(
      'sections' => $sections,
      'user' => $user
    );

    return view('pages.reservation',$content);
  }

}
