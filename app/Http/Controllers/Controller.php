<?php

namespace App\Http\Controllers;

use http\Env\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {
        return $this->formatState();
    }

    protected function formatState($data = [])
    {
        $needState = in_array(debug_backtrace()[1]['function'], ['index', 'show']) && !\Request::is('api/*');

        return $needState ?
            view('index')->with(['state' => $data]) :
            $data;

    }
}
