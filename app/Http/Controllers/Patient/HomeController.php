<?php
# @Date:   2019-10-29T16:01:54+00:00
# @Last modified time: 2019-10-29T16:42:37+00:00




namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{

  public function __construct()
  {
      $this->middleware('auth');
      $this->middleware('role:patient');
  }

  public function index()
  {
    return view('patient.home');
  }
}
