<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Datasource\ConnectionManager;
use Cake\Core\Exception\Exception;
use Cake\Log\Log;

class LogexsController extends AppController
{
    public function index()
    {
        Log::write('debug', "Something didn't work.");

        $this->log("Something didn't work.", 'debug');
    }
}
