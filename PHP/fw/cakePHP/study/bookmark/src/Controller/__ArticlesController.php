<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Articles Controller
 *
 * @property \App\Model\Table\ArticlesTable $Articles
 */
class ArticlesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $abc = 1;
        echo 'ahihi do ngok 123 456<br>';
        try {
            $abc->method();
        } catch (\Error $e) {
            echo $e->getMessage() . '<br>';
        } finally {
            echo 'ahihi do nguk <br>';
        }
        echo 'ahihi do ngok <br>';

        // try {
            $value = 1 << -1;
        /*} catch (\ArithmeticError $e) {
            echo $e->getMessage() . "<br>";
        }*/

        // try {
            // $value = 1 % 0;
        // } catch (DivisionByZeroError $e) {
            // echo $e->getMessage();
        // }
        // try {
            throw new \Exception('jijo');
        /*} catch (\Exception $e) {
            echo $e->getMessage() . "<br>";
        }*/
        echo 'ahihi do nguk <br>';
    }
    /**
     * Error
     */
    public function error()
    {
        $this->autoRender = false;
        $abc = 1;
        echo 'hello<br>';
        try {
            $abc->method();
        } catch (\Error $e) {
            echo $e->getMessage() . '<br>';
        } finally {
            echo 'ahihi do ngok<br>';
        }
        echo 'lalala<br>';
    }
    /**
     * TypeError
     */
    public function typeError()
    {
        $this->autoRender = false;
        function add(int $left, int $right)
        {
            return $left + $right;
        }

        try {
            $value = add('left', 'right');
        } catch (\TypeError $e) {
            echo $e->getMessage() . '<br>';
        }
        echo 'lalala<br>';
    }
    /**
     * ParseError
     */
    public function parseError()
    {
        $this->autoRender = false;
        try {
            // $result = eval("var_dup(1)");
            require 'lalala.php';
        } catch (\ParseError $e) {
        // } catch (\Error $e) {
            echo $e->getMessage() . '<br>';
        } catch (\Error $e) {
            echo 'ahaha';
        }
        echo 'lalala';
    }
    /**
     * ArithmeticError
     */
    public function ariError()
    {
        $this->autoRender = false;
        try {
            $value = 1 << -1;
        } catch (\ArithmeticError $e) {
            echo $e->getMessage() . '<br>';
        }
        echo 'lalala';
    }
}
