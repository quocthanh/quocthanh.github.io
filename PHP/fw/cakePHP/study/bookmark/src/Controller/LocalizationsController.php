<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Datasource\ConnectionManager;
use Cake\I18n\I18n;

class LocalizationsController extends AppController
{
    public function index()
    {
        if ($this->request->is('post')) {
            $locale = $this->request->data('locale');
            I18n::locale($locale);
        }
    }
}