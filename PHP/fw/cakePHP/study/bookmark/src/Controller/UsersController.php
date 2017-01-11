<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Datasource\ConnectionManager;
use Cake\Event\Event;

class UsersController extends AppController
{
    /**
     *
     */
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow(['add', 'logout']);
    }
    /**
     *
     */
    /*public function initialize()
    {
        parent::initialize();
        $this->Auth->allow(['add']);
    }*/
    /**
     *
     */
    public function index()
    {
        $this->set('users', $this->Users->find());
    }
    /**
     *
     */
    public function view($id)
    {
        $user = $this->Users->find($id);
        $this->set(compact('user'));
    }
    /**
     *
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(['action' => 'add']);
            }
            $this->Flash->error(__('Unable to add user.'));
        }
        $this->set(compact('user'));
    }
    /**
     *
     */
    public function haha()
    {

    }
    /**
     *
     */
    public function login()
    {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error(__('Invalid username or password, try again'));
        }
    }
    /**
     *
     */
    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }
}
