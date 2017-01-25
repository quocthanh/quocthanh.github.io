<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Core\Configure;
use Cake\Auth\DefaultPasswordHasher;

/**
 * Articles Controller
 *
 * @property \App\Model\Table\ArticlesTable $Articles
 */
class ArticlesController extends AppController
{
    /**
     *
     */
    public function index()
    {
        echo Configure::version() . '<br>';
        echo phpversion();
        $this->autoRender = false;
    }
    /**
     *
     */
    public function act1()
    {
        // return $this->render('/Elems/fifo', 'haha');
        $this->render('/Elems/fifa');
        // $this->render('fifa');
    }
    /**
     *
     */
    public function act2()
    {
        // $this->redirect(['controller' => 'Elems', 'action' => 'index'], 303);
        // $this->redirect(['controller' => 'Elems', 'action' => 'index'], 301);
        // $this->redirect(['controller' => 'Products', 'action' => 'index']);
        $this->redirect($this->referer());
    }
    /**
     *
     */
    public function act3()
    {
        $this->setAction('act1');
    }
    /**
     *
     */
    public function act4()
    {
        $this->loadModel('Categories');
        $res = $this->Categories->find();
        pr($res->toArray());
        $this->autoRender = false;
    }
    /**
     *
     */
    public function act5()
    {
        $this->autoRender = false;
        $hasher = new DefaultPasswordHasher();
        pr($hasher);
        echo PASSWORD_DEFAULT;
        echo PASSWORD_BCRYPT ;
    }
}
