<?php

namespace App\Controllers;

use App\Libraries\Controller;
use App\Libraries\Model;

class Pages extends Controller
{

    public function __construct()
    {

    }

    public function index()
    {
        $data = [
            'title' => 'SharePosts',
            'description' => 'Simple social network buily on the MVC PHP Framework'
        ];

        $this->view('pages/index', $data);
    }

    public function about()
    {
        $data = [
            'title' => 'About',
            'description' => 'App to share posts other users'
        ];

        $this->view('pages/about', $data);
    }
}