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
            $$key = $value; //на каждой итерации foreach будет создаваться новая переменная с именем, который будет равен $key.
            // В нашем случае создастся одна переменная $article, которая будет доступна в шаблоне $template
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
