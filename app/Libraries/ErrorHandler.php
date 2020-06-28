<?php

namespace App\Libraries;

use App\Http\Controllers\Controller;

class ErrorHandler extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }


    public function handle($e)
    {
        switch ($e->getStatusCode()) {

            case '403':
                return $this->show403();
                break;

            case '404':
                return $this->show404();
                break;

            case '503':
                return $this->show503();
                break;

            default:
                return $this->show500();
                break;
        }
    }
}
