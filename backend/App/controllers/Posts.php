<?php

namespace app\controllers;

use app\libraries\Controller;
use app\models\Post;
use app\models\User;

class Posts extends Controller
{
    private Post $postModel;
    private User $userModel;

    public function __construct()
    {
        if (!isLoggedIn()) {
            redirect('/users/login');
        }

        $this->postModel = $this->model('Post');
        $this->userModel = $this->model('User');
    }

    public function index()
    {
        $posts = $this->postModel->getPosts();

        $data = [
            'posts' => $posts
        ];

        $this->view('posts/index', $data);
    }

    public function add()
    {
        $data = [
            'title' => '',
            'body' => '',
            'title_err' => '',
            'body_err' => '',
        ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data['title'] = trim($_POST['title']);
            $data['body'] = trim($_POST['body']);
            $data['user_id'] = $_SESSION['user_id'];

            if (empty($data['title'])) {
                $data['title_err'] = 'Please enter title';
            }

            if (empty($data['body'])) {
                $data['body_err'] = 'Please enter body';
            }

            if (empty($data['title_err']) && empty($data['body_err'])) {

                if ($this->postModel->addPost($data)) {
                    flash('post_message', 'Post Added');
                    redirect('/posts');
                } else {
                    flash('post_error', 'An error occurred when trying to add a post, please try again', 'alert alert-danger');
                }

            }
        }

        $this->view('posts/edit', $data);
    }

    public function edit($id)
    {

        $post = $this->postModel->getPostById($id);

        if ($post->user_id != $_SESSION['user_id']) {
            redirect('posts');
        }

        $data = [
            'id' => $id,
            'title' => $post->title,
            'body' => $post->body,
            'user_id' => $post->user_id,
            'title_err' => '',
            'body_err' => '',
        ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data['title'] = trim($_POST['title']);
            $data['body'] = trim($_POST['body']);
            $data['user_id'] = $_SESSION['user_id'];

            if (empty($data['title'])) {
                $data['title_err'] = 'Please enter title';
            }

            if (empty($data['body'])) {
                $data['body_err'] = 'Please enter body';
            }

            if (empty($data['title_err']) && empty($data['body_err'])) {

                if ($this->postModel->updatePost($data)) {
                    flash('post_message', 'Post Updated');
                    redirect('/posts');
                } else {
                    flash('post_error', 'An error occurred when trying to edit this post, please try again', 'alert alert-danger');
                }

            }
        }

        $this->view('posts/edit', $data);
    }

    public function show($id)
    {
        $post = $this->postModel->getPostById($id);
        $user = $this->userModel->getUserById($post->user_id);

        $data = [
            'post' => $post,
            'user' => $user
        ];

        $this->view('posts/show', $data);
    }

    public function delete($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $post = $this->postModel->getPostById($id);

            if ($post->user_id != $_SESSION['user_id']) {
                redirect('posts');
            }

            if ($this->postModel->deletePost($id)) {
                flash('post_message', 'Post Removed');
                redirect('/posts');
            } else {
                flash('post_error', 'An error occurred when trying to delete this post, please try again', 'alert alert-danger');
                redirect('/posts/show/'.$id);
            }
        }

        redirect('/posts');
    }
}