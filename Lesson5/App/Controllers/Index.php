<?php

namespace App\Controllers;

use App\Controller;
use App\Exceptions\NotFoundException;
use App\Exceptions\UrlParamMissingException;
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
                throw new NotFoundException('Статья не найдена');
            }

            $this->view->display(__DIR__ . '/../Templates/News/One.php');

        } else {
            throw new UrlParamMissingException('Не переданы необходимые url-параметры для просмотра статьи');
        }
    }
}
