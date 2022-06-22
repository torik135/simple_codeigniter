<?php
namespace App\Controllers;

use App\Models\NewsModel;

class News extends BaseController
{
    public function index()
    {
        $model = model(NewsModel::class);
        $data = [
            'news' => $model->getNews(),
            'title' => 'News archive',
        ];

        return view('templates/header', $data)
        . view('news/overview')
        . view('templates/footer');
    }

    public function view($slug = null)
    {
        $model = model(NewsModel::class);
        // $model = new NewsModel();
        $data['news'] = $model->getNews($slug);
        
        if(empty($data['news'])){
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Page not Found: ' . $slug);
        }

        $data['title'] = $data['news']['title'];

        return view('templates/header', $data) 
        . view('news/view')
        . view('templates/footer');
    }
}
