<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Routing\Router;

class TestsController extends AppController
{
    public function index($arg1, $arg2)
    {
        $this->set('argument1', $arg1);
        $this->set('argument2', $arg2);
    }
    /**
     *
     */
    public function haha1()
    {
        $path = func_get_args();
        echo pr($path);
    }
    /**
     *
     */
    public function haha2($id)
    {
        echo Router::url(['controller' => 'TestsController', 'action' => 'haha']);
    }
    /**
     *
     */
    public function view($id)
    {
        echo $id;
    }
    /**
     *
     */
    public function haha()
    {

    }
}
