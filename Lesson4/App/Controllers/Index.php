<?php

namespace App\Controllers;

use App\Controller;
use App\Models\Article;

class Index
    extends Controller
{
    protected function actionDefault()
    {
        $this->view->news = Article::findAll();
        $this->view->display(__DIR__ . '/../Templates/News/Default.php');
    }

    protected function actionOne()
    {
        if (!empty($_GET['id'])) {
            $this->view->article = Article::findById($_GET['id']);

            if (empty($this->view->article)) {
                http_response_code(404);
                exit();
            }

            $this->view->display(__DIR__ . '/../Templates/News/One.php');

        } else {
            http_response_code(404);
            exit();
        }
    }
}
