<?php

namespace App\Http\Controllers;

use App\Repositories\BookingRepositoryInterface;
use Auth;
use Illuminate\Http\Request;

class BookingController extends Controller
{

  protected $SectionRepository;

  public function __construct(BookingRepositoryInterface $BookingRepository)
  {
    $this->middleware('auth');
    $this->BookingRepository = $BookingRepository;
    $this->user = Auth::user();
  }

  public function index($section = null)
  {
    $section = $this->BookingRepository->getSection($section);

    $content = array(
      'section' => $section
    );

    return view('pages.booking',$content);
  }
}
