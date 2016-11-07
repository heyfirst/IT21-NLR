<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use Socialite;

class MainController extends Controller
{
    protected $user;

    public function __construct (){

      // $this->user = Auth::user();

    }

}
