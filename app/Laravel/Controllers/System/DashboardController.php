<?php

namespace App\Laravel\Controllers\System;

use App\Laravel\Requests\PageRequest;
use App\Laravel\Models\{Music,Category,User};


class DashboardController extends Controller
{
    protected $data;

    public function __construct()
    {
        parent::__construct();
    }

    public function index(PageRequest $request)
    {
        $this->data['record'] = Music::with('user','categ')->get();
        $this->data['categories'] = Category::count();
        $this->data['users'] = User::count();

        
        $this->data['page_title'] = "Dashboard";
        return view('system.dashboard.index', $this->data);
    }
    
}
