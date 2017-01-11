<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Datasource\ConnectionManager;

class ProductsController extends AppController
{
    /**
     *
     */
    public function view()
    {
        $this->set('Product_Name', 'XYZ');
    }
}
