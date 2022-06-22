<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data = [
            'title' => "CodeIgniter 4"
        ];

        return view('templates/header', $data)
        . view('welcome_message')
        . view('templates/footer');
    }
}
