<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Datasource\ConnectionManager;
use Cake\Auth\DefaultPasswordHasher;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{
    /**
     * set logout
     */
    /*public function initialize()
    {
        parent::initialize();
        $this->Auth->allow(['logout', 'add']);
    }*/
    /**
     *
     */
    public function logout()
    {
        $this->Flash->success('You are now logged out');
        return $this->redirect($this->Auth->logout());
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    /*public function index()
    {
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
        $this->set('_serialize', ['users']);
    }*/
    public function index()
    {
        $users = TableRegistry::get('users');
        $query = $users->find();
        $this->set('results', $query);
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Bookmarks']
        ]);

        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    /*public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }*/
    public function add()
    {
        if ($this->request->is('post')) {
            $username = $this->request->data('username');
            $hashPswdObj = new DefaultPasswordHasher;
            $password = $hashPswdObj->hash($this->request->data('password'));

            $users_table = TableRegistry::get('users');
            $users = $users_table->newEntity();
            $users->username = $username;
            $users->password = $password;

            if ($users_table->save($users)) {
                echo "User is added";
            }
        }
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    /*public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }*/
    public function edit($id)
    {
        if ($this->request->is('post')) {
            $username = $this->request->data('username');
            $password = $this->request->data('password');
            $users_table = TableRegistry::get('users');
            $users = $users_table->get($id);
            $users->username = $username;
            $users->password = $password;

            if ($users_table->save($users)) {
                echo 'User is updated';
            }
            $this->setAction('index');
        } else {
            $users_table = TableRegistry::get('users')->find();
            $users = $users_table->where(['id' => $id])->first();
            $this->set('username', $users->username);
            $this->set('password', $users->password);
            $this->set('id', $users->id);
        }
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    /*public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }*/
    public function delete($id)
    {
        $users_table = TableRegistry::get('users');
        $users = $users_table->get($id);
        $users_table->delete($users);
        echo 'User deleted successfully';
        $this->setAction('index');
    }
    /**
     * show the login page
     */
    public function login()
    {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();

            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error('Your username or password is incorrect');
        }
    }
}
