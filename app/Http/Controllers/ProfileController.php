<?php

namespace App\Http\Controllers;

// use App\Repositories\SectionRepositoryInterface;
use Auth;
use Illuminate\Http\Request;

class ProfileController extends MainController
{

  protected $ProfileRepository;

  public function __construct(){
    parent::__construct();
    // ProfileRepositoryInterface $ProfileRepository
    // $this->$ProfileRepository = $ProfileRepository;
  }

  public function index(){

    $content = array(
      'name' => "",
      'old' => 6
    );

    return view('pages.profile',$content);
  }
}
