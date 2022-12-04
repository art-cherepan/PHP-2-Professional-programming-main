<?php

namespace App\Controllers;

use App\Controller;
use App\Exceptions\ErrorsExceptions;
use App\Exceptions\NotFoundException;
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
                throw new NotFoundException('Статья, которую требуется отредактировать, не найдена');
            }

            $this->view->display(__DIR__ . '/../../Admin/Templates/Edit.php');

        } else {
            $this->view->display(__DIR__ . '/../../Admin/Templates/Edit.php');
        }
    }

    protected function actionSave()
    {
        if (isset($_POST['id']) && isset($_POST['title']) && isset($_POST['lead'])) {
            if (is_numeric($_POST['id'])) {
                $article = Article::findById($_POST['id']);

                try {
                    $article->fill($_POST);
                    $article->save();
                    header('Location: http://localhost/profit_part2/Lesson5/Admin/');
                    exit();

                } catch (ErrorsExceptions $errors){
                    $this->view->article = $article;
                    $this->view->errors = $errors->getAll();
                    $this->view->display(__DIR__ . '/../../Admin/Templates/Edit.php');
                }

            } elseif ('' == $_POST['id']) {
                $article = new Article();

                try {
                    $article->fill($_POST);
                    $article->save();
                    header('Location: http://localhost/profit_part2/Lesson5/Admin/');
                    exit();

                } catch (ErrorsExceptions $errors){
                    $this->view->article = $article;
                    $this->view->errors = $errors->getAll();
                    $this->view->display(__DIR__ . '/../../Admin/Templates/Edit.php');
                }

            }
        } else {
            header('Location: http://localhost/profit_part2/Lesson5/Admin/');
        }
    }

    protected function actionDelete()
    {
        if (!empty($_GET['id'])) {
            $article = Article::findById($_GET['id']);

            if (empty($article)){
                header('Location: http://localhost/profit_part2/Lesson5/Admin/Default');
            }

            $article->delete();
        }

        header('Location: http://localhost/profit_part2/Lesson5/Admin/Default');
    }
}
