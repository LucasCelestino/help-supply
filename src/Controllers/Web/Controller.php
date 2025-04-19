<?php

namespace App\Controllers\Web;

use App\Models\Model;
use League\Plates\Engine;
use App\Core\Session;

abstract class Controller
{

    /**
     * @param string $viewPath
     * @param string $view
     * @param array|null $data
     *
     * @return null
     */
    protected function render(string $viewPath, string $view, array $data = null)
    {
        $templates = new Engine(VIEW_ROOT . $viewPath);

        echo $templates->render($view, $data);
    }

    /**
     * @param mixed $model
     *
     * @return Model
     */
    protected function model($model)
    {
        $model = "\App\Models\\".$model;
        return new $model();
    }

    protected function session()
    {
        $session = new Session();

        return $session;
    }
}