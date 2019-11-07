<?php

namespace App\Http\Controllers;

use App\Job;
use App\Company;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::recent();
        $companies = Company::all()->toArray();
        return view('index', compact('jobs'), compact('companies'));
    }
}
