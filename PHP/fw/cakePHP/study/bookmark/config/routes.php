<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

use Cake\Core\Plugin;
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;
use Cake\Routing\Route\DashedRoute;

/**
 * The default class to use for all routes
 *
 * The following route classes are supplied with CakePHP and are appropriate
 * to set as the default:
 *
 * - Route
 * - InflectedRoute
 * - DashedRoute
 *
 * If no call is made to `Router::defaultRouteClass()`, the class used is
 * `Route` (`Cake\Routing\Route\Route`)
 *
 * Note that `Route` does not do any inflections on URLs which will result in
 * inconsistently cased URLs when used with `:plugin`, `:controller` and
 * `:action` markers.
 *
 */
Router::defaultRouteClass(DashedRoute::class);

/*
 * tag action
 */
/*Router::scope(
    '/bookmarks',
    ['controller' => 'Bookmarks'],
    function($routes) {
        $routes->connect('/tagged/*', ['action' => 'tags']);
    }
);*/

Router::scope('/', function (RouteBuilder $routes) {
    /**
     * Here, we are connecting '/' (base path) to a controller called 'Pages',
     * its action called 'display', and we pass a param to select the view file
     * to use (in this case, src/Template/Pages/home.ctp)...
     */
    $routes->connect('/', ['controller' => 'Pages', 'action' => 'display', 'home']);

    /**
     * ...and connect the rest of 'Pages' controller's URLs.
     */
    // $routes->connect('/pages/*', ['controller' => 'Pages', 'action' => 'display']);

    /**
     * Connect catchall routes for all controllers.
     *
     * Using the argument `DashedRoute`, the `fallbacks` method is a shortcut for
     *    `$routes->connect('/:controller', ['action' => 'index'], ['routeClass' => 'DashedRoute']);`
     *    `$routes->connect('/:controller/:action/*', [], ['routeClass' => 'DashedRoute']);`
     *
     * Any route class can be used with this method, such as:
     * - DashedRoute
     * - InflectedRoute
     * - Route
     * - Or your own route class
     *
     * You can remove these routes once you've connected the
     * routes you want in your application.
     */
    $routes->fallbacks(DashedRoute::class);
});

/*Router::scope('/', function($routes) {
    $routes->connect('/', ['controller' => 'Articles', 'action' => 'index']);
});*/

/*Router::scope('/', function(RouteBuilder $routes) {
    $routes->connect('/', ['controller' => 'Tests', 'action' => 'index']);
    $routes->connect('/pages/*', ['controller' => 'Pages', 'action' => 'display']);
    $routes->fallbacks(DashedRoute::class);
});*/

/*Router::scope('/', function(RouteBuilder $routes) {
    $routes->connect(
        'tests/:arg1/:arg2',
        ['controller' => 'Tests', 'action' => 'index'],
        ['pass' => ['arg1', 'arg2']]
    );

    $routes->connect('pages/*', ['controller' => 'Pages', 'action' => 'display']);

    $routes->fallbacks(DashedRoute::class);
});*/

//Router::connect('/', ['controller' => 'Pages', 'action' => 'display', 'home']);

//Generating URLs----------------------------------------------------------------------
/*Router::scope('/', function(RouteBuilder $routes) {
    $routes->connect('generate', ['controller' => 'Generates', 'action' => 'index']);
});*/



//redirect route------------------------------------------------------------------------
/*Router::scope('/', function(RouteBuilder $routes) {
    $routes->connect('generate2', ['controller' => 'Tests', 'action' => 'index']);
    $routes->redirect('generate1', 'http://tutorialspoint.com/');
    $routes->connect('generate_url', ['controller' => 'Generates', 'action' => 'index']);
    $routes->fallbacks(DashedRoute::class);
});*/



//controllers----------------------------------------------------------------------------
/*Router::scope('/', function(RouteBuilder $routes) {
    $routes->connect(
        'redirectcontroller',
        ['controller' => 'Redirects', 'action' => 'action1']
    );
    $routes->connect(
        'redirectcontroller2',
        ['controller' => 'Redirects', 'action' => 'action2']
    );
    $routes->fallbacks(DashedRoute::class);
});*/


//view------------------------------------------------------------------------------------
/*Router::scope('/', function(RouteBuilder $routes) {
    $routes->connect('template', ['controller' => 'Products', 'action' => 'view']);
    $routes->fallbacks(DashedRoute::class);
});*/

/*Router::scope('/', function(RouteBuilder $routes) {
    $routes->connect('extend', ['controller' => 'Extends', 'action' => 'index']);
    $routes->fallbacks(DashedRoute::class);
});*/
/*Router::scope('/', function(RouteBuilder $routes) {
    $routes->connect('elementexample', ['controller' => 'Elems', 'action' => 'index']);
    $routes->fallbacks(DashedRoute::class);
});*/


//database--------------------------------------------------------------------------------
/*Router::scope('/', function(RouteBuilder $routes) {
    $routes->connect('users/add', ['controller' => 'Users', 'action' => 'add']);
    $routes->fallbacks(DashedRoute::class);
});*/
/*Router::scope('/', function(RouteBuilder $routes) {
    $routes->connect('users', ['controller' => 'Users', 'action' => 'index']);
    $routes->fallbacks(DashedRoute::class);
});*/
/*Router::scope('/', function(RouteBuilder $routes) {
    $routes->connect('users/edit', ['controller' => 'Users', 'action' => 'edit']);
    $routes->connect('users/delete', ['controller' => 'Users', 'action' => 'delete']);
    $routes->fallbacks(DashedRoute::class);
});*/


//authentication---------------------------------------------------------------------------
/*Router::scope('/', function(RouteBuilder $routes) {
    $routes->connect('auth', ['controller' => 'Authexs', 'action' => 'index']);
    $routes->connect('login', ['controller' => 'Authexs', 'action' => 'login']);
    $routes->connect('logout', ['controller' => 'Authexs', 'action' => 'logout']);
    $routes->fallbacks(DashedRoute::class);
});*/


//errors------------------------------------------------------------------------------------
/*Router::scope('/', function(RouteBuilder $routes) {
    $routes->connect(
        'exception/:arg1/:arg2',
        [
            'controller' => 'Exps',
            'action' => 'index'
        ],
        [
            'pass' => ['arg1', 'arg2']
        ]);
});*/


//logging------------------------------------------------------------------------------------
/*Router::scope('/', function(RouteBuilder $routes) {
    $routes->connect('logex', ['controller' => 'Logexs', 'action' => 'index']);
    $routes->fallbacks(DashedRoute::class);
});*/


//form helper---------------------------------------------------------------------------------
/*Router::scope('/', function(RouteBuilder $routes) {
    $routes->connect('register', ['controller' => 'Registrations', 'action' => 'index']);
    $routes->fallbacks(DashedRoute::class);
});*/


//internationalization------------------------------------------------------------------------
/*Router::scope('/', function(RouteBuilder $routes) {
    $routes->connect('locale', ['controller' => 'Localizations', 'action' => 'index']);
    $routes->fallbacks(DashedRoute::class);
});*/


//session--------------------------------------------------------------------------------------
/*Router::scope('/', function(RouteBuilder $routes) {
    $routes->connect('sessionobject', ['controller' => 'Sessions', 'action' => 'index']);
    $routes->connect('sessionread', ['controller' => 'Sessions', 'action' => 'retrieve_session_data']);
    $routes->connect('sessionwrite', ['controller' => 'Sessions', 'action' => 'write_session_data']);
    $routes->connect('sessioncheck', ['controller' => 'Sessions', 'action' => 'check_session_data']);
    $routes->connect('sessiondelete', ['controller' => 'Sessions', 'action' => 'delete_session_data']);
    $routes->connect('sessiondestroy', ['controller' => 'Sessions', 'action' => 'destroy_session_data']);
    $routes->fallbacks(DashedRoute::class);
});*/


//validation------------------------------------------------------------------------------------
/*::scope('/', function(RouteBuilder $routes) {
    $routes->connect('validation', ['controller' => 'Valids', 'action' => 'index']);
    $routes->fallbacks(DashedRoute::class);
});*/

/* Router::connect(
    '/tests/haha/:id',
    ['controller' => 'Tests', 'action' => 'haha'],
    ['id' => '[0-9]', 'pass' => ['id']]
); */

//----------------------------------------------------------COOKBOOK-----------------------------------------------------------
//-----------------------------------------------------------------------------------------------------------------------------

//routing----------------------------------------------------------------------------------------------------------------------

/*Router::scope('tests/', function(RouteBuilder $routes) {
    $routes->connect(
        '/haha',
        ['controller' => 'Tests', 'action' => 'haha'],
        ['_name' => 'ahihi']
    );
});*/

/*Router::scope('/', function(RouteBuilder $routes) {
    $routes->connect(
        'tests/haha/:id',
        ['controller' => 'Tests', 'action' => 'haha'],
        ['id' => '\d+', 'pass' => ['id']]
    );
    // $routes->fallbacks(DashedRoute::class);
});*/

/*Router::scope('/', ['_namePrefix' => 'api:'], function(RouteBuilder $routes) {
    $routes->connect(
        '/tests/haha',
        ['controller' => 'Tests', 'action' => 'haha'],
        ['_name' => 'hehe']
    );
});*/

Router::scope('/', function(RouteBuilder $routes) {
    /*$routes->connect(
        '/:controller/:id',
        ['action' => 'view'],
        ['id' => '[0-9]+', 'pass' => ['id']]
    );*/
    /*$routes->connect(
        '/:userShortcut',
        ['controller' => 'Tests', 'action' => 'haha'],
        ['userShortcut' => '(?i:principal)']
    );*/
    $routes->redirect(
        '/tests/haha',
        'http://google.com',
        ['status' => 302]
    );
});


Router::scope('/', function(RouteBuilder $routes) {
    $routes->fallbacks(DashedRoute::class);
});

/**
 * Load all plugin routes.  See the Plugin documentation on
 * how to customize the loading of plugin routes.
 */
Plugin::routes();
