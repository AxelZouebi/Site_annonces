<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\City;
use App\Models\User;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function accueil()
    {
        $jobs = Job::online()->latest()->get();
        $city = City::get();
        return view('accueil', ['jobs' => $jobs], ['city' => $city]);
    }

    public function index()
    {
        $jobs = Job::online()->latest()->get();
        $city = City::get();
        return view('jobs.index', ['jobs' => $jobs], ['city' => $city]);
    }

    public function show()
    {        
        $jobs = Job::online()->latest()->get();
        $city = City::orderBy('cities')->get();
        return view('jobs.show', ['jobs' => $jobs], ['city' => $city]);
    }

    public function show_city(City $cities)
    {
        return view('jobs.show_cities', ['city' =>$cities]);
    }
}