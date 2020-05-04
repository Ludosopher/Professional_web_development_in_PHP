<?php

namespace App\services\renderers;

class TwigRenderer implements IRenderer
{
    public function render($template, $params = []) {
        $content = $this->renderTmpl($template, $params);
        return $this->renderTmpl('layouts/main', ['content' => $content]);
    }

    protected function renderTmpl($template, $params = [])
    {
        $loader = new \Twig\Loader\FilesystemLoader(dirname(__DIR__, 2) . '/views');
        $twig = new \Twig\Environment($loader);
        ob_start();
        //extract($params);
        echo $twig->render($template . '.twig', [$params]);
        //return ob_get_clean();
    }
}
