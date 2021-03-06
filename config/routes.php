<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */
use Cake\Http\Middleware\CsrfProtectionMiddleware;
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
 * Cache: Routes are cached to improve performance, check the RoutingMiddleware
 * constructor in your `src/Application.php` file to change this behavior.
 *
 */
Router::defaultRouteClass(DashedRoute::class);

Router::scope('/', function (RouteBuilder $routes) {
    // Register scoped middleware for in scopes.
    $routes->registerMiddleware('csrf', new CsrfProtectionMiddleware([
        'httpOnly' => true
    ]));

    /**
     * Apply a middleware to the current route scope.
     * Requires middleware to be registered via `Application::routes()` with `registerMiddleware()`
     */
    $routes->applyMiddleware('csrf');

    /**
     * Here, we are connecting '/' (base path) to a controller called 'Pages',
     * its action called 'display', and we pass a param to select the view file
     * to use (in this case, src/Template/Pages/home.ctp)...
     */
    $routes->connect('/', ['controller' => 'Client', 'action' => 'casebegin']);
    $routes->connect('/client/casebegin', ['controller' => 'Client', 'action' => 'casebegin']);
    $routes->connect('/client/post-casebegin', ['controller' => 'Client', 'action' => 'casebeginPost']);
    $routes->connect('/client/ajax-upload/*', ['controller' => 'Client', 'action' => 'ajaxUpload']);
    $routes->connect('/client/ajax-delete/*', ['controller' => 'Client', 'action' => 'ajaxDelete']);
    $routes->connect('/client/test', ['controller' => 'Client', 'action' => 'test']);
    $routes->connect('/client/download2/*', ['controller' => 'Client', 'action' => 'download2']);
    $routes->connect('/client/users/login', ['controller' => 'Users', 'action' => 'login']);
    $routes->connect('/client/users', ['controller' => 'Users', 'action' => 'login']);
    $routes->connect('/client/login', ['controller' => 'Users', 'action' => 'login']);
   
    // $routes->connect('/admin/login', ['controller' => 'Client', 'action' => 'adminLogin']);
    // $routes->connect('/admin/casebrowser', ['controller' => 'Client', 'action' => 'adminCasebrowser']);
    
    // $routes->connect('admin/casenotes/*', ['controller' => 'Client', 'action' => 'adminCasenotes']);
    // $routes->connect('admin/casetracker/*', ['controller' => 'Client', 'action' => 'adminCasetracker']);

    


    /**
     * ...and connect the rest of 'Pages' controller's URLs.
     */
    $routes->connect('/pages/*', ['controller' => 'Pages', 'action' => 'display']);

    /**
     * Connect catchall routes for all controllers.
     *
     * Using the argument `DashedRoute`, the `fallbacks` method is a shortcut for
     *
     * ```
     * $routes->connect('/:controller', ['action' => 'index'], ['routeClass' => 'DashedRoute']);
     * $routes->connect('/:controller/:action/*', [], ['routeClass' => 'DashedRoute']);
     * ```
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

Router::prefix('client', function ($routes) {
    $routes->prefix('admin', function($routes)
    {
        $routes->connect('/myaccount', ['controller' => 'Admin', 'action' => 'myaccount']);
        $routes->connect('/caseedit/*', ['controller' => 'Admin', 'action' => 'caseedit']);
        $routes->connect('/casebrowser', ['controller' => 'Admin', 'action' => 'casebrowser']);
        $routes->connect('/checkread', ['controller' => 'Admin', 'action' => 'checkread']);
        $routes->connect('/checknotify', ['controller' => 'Admin', 'action' => 'checknotify']);
        $routes->connect('/casenotes/*', ['controller' => 'Admin', 'action' => 'casenotes']);
        $routes->connect('/casenotes2/*', ['controller' => 'Admin', 'action' => 'casenotes2']);
        $routes->connect('/export/*', ['controller' => 'Admin', 'action' => 'export']);
        $routes->connect('/caseunlock/*', ['controller' => 'Admin', 'action' => 'caseunlock']);
        $routes->connect('/casetracker/*', ['controller' => 'Admin', 'action' => 'casetracker']);
        $routes->connect('/casedelete/*', ['controller' => 'Admin', 'action' => 'casedelete']);
        $routes->connect('/casesend/*', ['controller' => 'Admin', 'action' => 'casesend']);
        $routes->connect('/exportcase/*', ['controller' => 'Admin', 'action' => 'exportcase']);
        $routes->connect('/change_case_status', ['controller' => 'Admin', 'action' => 'changeCase']);
        $routes->connect('/client/casetracker/*', ['controller' => 'Client', 'action' => 'casetracker']);
        $routes->connect('/', ['controller' => 'Admin', 'action' => 'casebrowser']);
        $routes->fallbacks(DashedRoute::class);    
    });
    $routes->fallbacks(DashedRoute::class);
});

/**
 * If you need a different set of middleware or none at all,
 * open new scope and define routes there.
 *
 * ```
 * Router::scope('/api', function (RouteBuilder $routes) {
 *     // No $routes->applyMiddleware() here.
 *     // Connect API actions here.
 * });
 * ```
 */
