<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BackendBaseController extends Controller
{
    function __loadDataToView($view_path)
    {
        view()->composer($view_path, function($view){
            $view->with('base_route', $this->base_route);
            $view->with('base_view', $this->base_view);
            $view->with('module', $this->module);
        });
        return $view_path;
    }
}
