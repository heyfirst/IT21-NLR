<?php

namespace App\Http\Controllers;

use App\Repositories\SectionRepositoryInterface;
use Auth;
use Illuminate\Http\Request;

class ProfileController extends MainController
{

  protected $ProfileRepository;

  public function __construct(ProfileRepositoryInterface $ProfileRepository){
    parent::__construct();
    $this->$ProfileRepository = $ProfileRepository;
  }

  public function index(){
    return null;
  }
}
