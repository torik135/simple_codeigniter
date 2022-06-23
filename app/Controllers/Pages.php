<?php
namespace App\Controllers;

class Pages extends BaseController
{
    public function index()
    {
        return view('welcome_message');
    }

    public function view($page = 'home')
    {
        if (! is_file(APPPATH . 'Views/pages/' . $page . '.php')){
            throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
        }

        // $data['title'] = ucfirst($page);
        $data = [
            'title' => ucfirst($page),
            'views' => 'app/Views/pages/' . $page . '.php',
            'ctr' => 'app/Controllers/Pages.php',
        ];

        return view('templates/header', $data)
            .view('pages/' . $page)
            .view('templates/footer');
    }
}
