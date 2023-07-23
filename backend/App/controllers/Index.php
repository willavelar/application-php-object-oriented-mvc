<?php

namespace app\controllers;

use app\libraries\Controller;

class Index extends Controller
{
    public function index() : void
    {
        $this->view('index', ['title' => 'Welcome']);
    }
}