<?php
class TwigView extends View
{
    public static $ext = '.twig';

    public function __construct(Controller $controller)
    {
        $this->controller = $controller;
        $loader = new \Twig_Loader_Filesystem(VIEWS_DIR);
        $this->twig = new \Twig_Environment($loader);
    }

    public function render($action = null)
    {
        $action = is_null($action) ? $this->controller->action : $action;
        if (strpos($action, '/') === false) {
            $template = $this->controller->name . DIRECTORY_SEPARATOR . $action . self::$ext;
        } else {
            $template = $action .  self::$ext;
        }

        $this->controller->output = $this->twig->render($template, $this->vars);
    }
}
