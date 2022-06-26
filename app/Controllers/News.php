<?php
namespace App\Controllers;

use App\Models\NewsModel;

class News extends BaseController
{
    public function index()
    {
        $model = model(NewsModel::class);
        $data = [
            // 'news' => $model->getNews(),
            'news' => $model->paginate(10),
            'pager' => $model->pager,
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
            'success' => 'Created',
        ];

        $validateNews = [
            'title' => [
                'rules' =>'required|is_unique[news.title]|min_length[3]|max_length[255]',
                'errors' => [
                    'required' => 'Title cannot be empty.',
                    'is_unique' => 'Title is taken. Please choose another.',
                    'min_length' => 'Title must be longer than 3 words',
                    'max_length' => 'Title is too long [3 to 255 words].',
                ],
        ],
            'body' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Body cannot be empty.',
                ],
            ],
        ];

        if ($this->request->getMethod() === 'post' && $this->validate($validateNews)) {
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

    public function delete($id)
    {
        $model = model(NewsModel::class);

        $data = [
            'title' => 'Delete Item',
        ];

        $model->delete($id);

        return view('templates/header', $data)
        . view('news/deleted')
        . view('templates/footer');
    }

    public function edit($slug)
    {
        $model = model(NewsModel::class);

        $dbTitle = $model->getNews($slug);

        $data = [
            'title' => 'Edit News',
            'news' => $model->getNews($slug),
        ];

        // return redirect('news/'. $slug);

        return view('templates/header', $data)
        . view('news/edit')
        . view('templates/footer');
    }

    public function update($id)
    {
        $model = model(NewsModel::class);

        $dbTitle = $model->getNews($this->request->getVar('slug'));
        if($dbTitle['title'] == $this->request->getVar('title')){
            $rule_title = 'required|min_length[3]|max_length[255]';
        } else {
            $rule_title = 'required|is_unique[news.title]|min_length[3]|max_length[255]';
        }

        $validateNews = [
            'title' => [
                'rules' => $rule_title, 
                'errors' => [
                    'required' => 'Title cannot be empty.',
                    'is_unique' => 'Title is taken. Please choose another.',
                    'min_length' => 'Title must be longer than 3 words',
                    'max_length' => 'Title is too long [3 to 255 words].',
                ],
        ],
            'body' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Body cannot be empty.',
                ],
            ],
        ];

        $data = [
            'title' => 'Edit data',
            'success' => 'Edited',
        ];

        if($this->validate($validateNews)) {
            $model->save([
                'id' => $id,
                'title' => $this->request->getPost('title'),
                'slug' => url_title($this->request->getPost('title'), '-', true),
                'body' => $this->request->getPost('body'),
            ]);

            return view('templates/header', $data)
            . view('news/success')
            . view('templates/footer');
        }

        return redirect('news/'. $slug);
    }
}
