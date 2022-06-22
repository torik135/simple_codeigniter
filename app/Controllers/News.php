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

    public function create()
    {
        $model = model(NewsModel::class);

        $data = [
            'title' => 'Create News',
        ];

        if ($this->request->getMethod() === 'post' && $this->validate([
            'title' => 'required|min_length[3]|max_length[255]',
            'body' => 'required',
        ])) {
            $model->save([
                'title' => $this->request->getPost('title'),
                'slug' => url_title($this->request->getPost('title'), '-', true),
                'body' => $this->request->getPost('body'),
            ]);

            return view('templates/header', $data)
            . view('news/success')
            . view('templates/footer');
        }

        return view('templates/header', $data)
        . view('news/create')
        . view('templates/footer');
    }
}