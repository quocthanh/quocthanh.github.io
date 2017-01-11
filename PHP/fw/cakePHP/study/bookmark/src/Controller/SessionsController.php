<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Datasource\ConnectionManager;

class SessionsController extends AppController
{
    public function index()
    {

    }
    /**
     *
     */
    public function retrieveSessionData()
    {
        $sessions = $this->request->session();
        $name = $sessions->read('name');
        $this->set('name', $name);
    }
    /**
     *
     */
    public function writeSessionData()
    {
        $sessions = $this->request->session();
        $sessions->write('name', 'Ahaha Lambada');
    }
    /**
     *
     */
    public function checkSessionData()
    {
        $session = $this->request->session();

        $name = $session->check('name');
        $address = $session->check('address');
        $this->set('name', $name);
        $this->set('address', $address);
    }
    /**
     *
     */
    public function deleteSessionData()
    {
        $session = $this->request->session();
        $session->delete('name');
    }
    /**
     *
     */
    public function destroySessionData()
    {
        $session = $this->request->session();
        $session->destroy();
    }
}