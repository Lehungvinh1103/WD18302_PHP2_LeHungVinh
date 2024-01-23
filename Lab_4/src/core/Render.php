<?php

namespace App\core;

class Render
{
    public string $title = '';
    public string $layout = 'main';

    public function renderView($view, $params = [])
    {
        $viewContent = $this->renderContent($view, $params);
        $view = $this->layoutContent($viewContent, $params);
        return $view;
    }

    protected function layoutContent($viewContent, $params = [])
    {
        $params['content'] = $viewContent;
        $layout = $this->layout;

        extract($params);

        ob_start();
        include_once __DIR__ . '/../views/layouts/'.$layout . '.php';
        return ob_get_clean();
    }

    protected function renderContent($view, $params = [])
    {
        extract($params);

        ob_start();
        include_once __DIR__ . '/../views/contents/'. $view . '.php';
        return ob_get_clean();
    }
}
