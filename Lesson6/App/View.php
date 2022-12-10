<?php

namespace App;

/**
 * Class View
 *
 * @property $news
 */
class View
    implements \Countable
{
    use MagicMethodsTrait;

    protected $data = [];

    public function render($template)
    {
        ob_start();
        foreach ($this->data as $key => $value){
            $$key = $value; //пробегаемся по data[] и создаем переменные, имена которых буду равны ключам в data[]. Эти переменные будут доступны в шаблоне
        }
        include $template;
        $contents = ob_get_contents();
        ob_end_clean();

        return $contents;
    }

    public function display($template)
    {
        echo $this->render($template);
    }

    public function count(): int
    {
        return count($this->data);
    }
}
