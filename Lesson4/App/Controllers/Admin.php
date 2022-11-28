<?php

namespace App\Controllers;

use App\Controller;
use App\Models\Article;

class Admin
    extends Controller
{
    protected function actionDefault()
    {
        $this->view->items = Article::findAll();
        $this->view->display(__DIR__ . '/../../Admin/Templates/Default.php');
    }

    protected function actionEdit()
    {
        if (!empty($_GET['id'])) {
            $this->view->article = Article::findById($_GET['id']);

            if (empty($this->view->article)) {
                http_response_code(404);
                exit();
            }

            $this->view->display(__DIR__ . '/../../Admin/Templates/Edit.php');

        } else{
            http_response_code(404);
            exit();
        }
    }

    protected function actionCreate()
    {
        if (isset($_POST['title']) && isset($_POST['lead'])) {

            $article = new Article();
            $article->title = $_POST['title'];
            $article->lead = $_POST['lead'];
            $article->save();

            header('Location: http://localhost/profit_part2/Lesson4/Admin/Default');
        } else {
            $this->view->display(__DIR__ . '/../../Admin/Templates/Create.php');
        }
    }

    protected function actionUpdate()
    {
        if (isset($_POST['id']) && isset($_POST['title']) && isset($_POST['lead'])) {

            $article =Article::findById($_POST['id']);
            $article->title = $_POST['title'];
            $article->lead = $_POST['lead'];
            $article->save();

        }

        header('Location: http://localhost/profit_part2/Lesson4/Admin/Default');
    }

    protected function actionDelete()
    {
        if (!empty($_GET['id'])) {
            $article = Article::findById($_GET['id']);


            if (empty($article)){
                header('Location: http://localhost/profit_part2/Lesson4/Admin/Default');
            }

            $article->delete();
        }

        header('Location: http://localhost/profit_part2/Lesson4/Admin/Default');
    }
}
