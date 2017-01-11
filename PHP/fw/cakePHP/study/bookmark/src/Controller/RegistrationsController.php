<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Datasource\ConnectionManager;

class RegistrationsController extends AppController
{
    public function index()
    {
        $country = ['India', 'United State of America', 'United Kingdom'];
        $this->set('country', $country);
        $gender = ['Male', 'Female'];
        $this->set('gender', $gender);
    }
}
