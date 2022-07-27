<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index(){
        return view('welcome');
    }
    public function about(){
        $company = 'CCT';
        $users = ['John', 'Mary', 'Bob'];
        return view('about',[
            'company2' => $company,
            'user' =>$users
        ]);
    }


}
