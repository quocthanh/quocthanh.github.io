<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Core\Configure;
use Cake\Network\Exception\NotFoundException;

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
        echo Configure::version();
    }
    /**
     * Error
     *
     * catch fatal errors or recoverable fatal errors
     */
    public function error()
    {
        $abc = 1;
        echo $xyz;
        // throw new Exception('hihi');
        // throw new NotFoundException('hihi');
        // try {
            $abc->method();
        /*} catch (\Error $e) {
            echo $e->getMessage() . '<br>';
        } finally {
            echo 'ahihi do ngok<br>';
        }*/
        echo 'lalala';
    }
    /**
     * TypeError
     *
     * A TypeError instance is thrown when a function argument
     * or return value does not match a type declaration.
     */
    public function typeError()
    {
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
     *
     * A ParseError is thrown when an included/required file
     * or eval()'d code contains a syntax error.
     */
    public function parseError()
    {
        try {
            // $result = eval("var_dup(1);");
            require 'lalala.php';
        } catch (\ParseError $e) {
            echo $e->getMessage() . '<br>';
        } catch (\Error $e) {
            echo $e->getMessage() . '<br>';
        }
        echo 'lalala';
    }
    /**
     * ArithmeticError
     *
     * An ArithmeticError is thrown in two situations:
     * bit shifting by a negative number
     * or calling intdiv() with a numerator of PHP_INT_MIN and denominator of -1
     */
    public function ariError()
    {
        try {
            $value = 1 << -1;
        } catch (\ArithmeticError $e) {
            echo $e->getMessage() . '<br>';
        }
        echo 'lalala';
    }
}
