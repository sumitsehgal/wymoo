<?php
/**
 * This file is part of Frontusers.
 * Routes configuration
 *
 * Author:  Manmohan Singh Meena <manmohan.meena@fullestop.com>
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different urls to chosen controllers and their actions (functions).
 *
 * Copyright 2012, Gempulse Infotech Pvt. Ltd. (http://www.fullestop.com)
 *
 * @copyright Copyright 2010, Gempulse Infotech Pvt. Ltd. (http://www.fullestop.com)
 * @license MIT License (http://www.opensource.org/licenses/mit-license.php)
 *
 * PHP version 5
 * CakePHP version 1.3
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2012, Gempulse Infotech Pvt. Ltd. (http://www.fullestop.com)
 * @link          http://www.fullestop.com
 * @package       cake
 * @subpackage    cake.app.config
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

	Router::connect('/casebegin', array('plugin'=>'cases','controller' => 'cases', 'action' => 'casebegin'));
	Router::connect('/casetracker', array('plugin'=>'cases','controller' => 'cases', 'action' => 'casetracker'));
	Router::connect('/notifications', array('plugin'=>'cases','controller' => 'cases', 'action' => 'notifications'));
	Router::connect('/caseinfo/*', array('plugin'=>'cases','controller' => 'cases', 'action' => 'caseinfo'));

/**
 * Routing.prefixes admin 
 */	
	$Routingprefix = 'admin';	
/**
 * Here, we are connecting 'admin/users/*' (base path) to plugin frontusers and controller called 'users' for Routing.prefixes admin,
 * its action called 'index', and we pass a param to select the view file
 * to use (in this case, /app/plugins/frontusers/views/users/index.ctp)...
 */		 
	
	Router::connect('/'.$Routingprefix.'/casebrowser/*', array('plugin'=>'cases','controller' => 'cases', 'action' => 'casebrowser',$Routingprefix => true));
/**
 * Here, we are connecting 'admin/users/*' (base path) to plugin frontusers and controller called 'users' for Routing.prefixes admin,
 * its action called 'index', and we pass a param to select the view file
 * to use (in this case, /app/plugins/frontusers/views/users/index.ctp)...
 */		 
	Router::connect('/'.$Routingprefix.'/caseinfo/*', array('plugin'=>'cases','controller' => 'cases', 'action' => 'caseinfo',$Routingprefix => true));
/**
 * Here, we are connecting 'admin/users/*' (base path) to plugin frontusers and controller called 'users' for Routing.prefixes admin,
 * its action called 'index', and we pass a param to select the view file
 * to use (in this case, /app/plugins/frontusers/views/users/index.ctp)...
 */		
	Router::connect('/'.$Routingprefix.'/casetracker/*', array('plugin'=>'cases','controller' => 'cases', 'action' => 'casetracker',$Routingprefix => true));
/**
 * Here, we are connecting 'admin/users/*' (base path) to plugin frontusers and controller called 'users' for Routing.prefixes admin,
 * its action called 'index', and we pass a param to select the view file
 * to use (in this case, /app/plugins/frontusers/views/users/index.ctp)...
 */		
	Router::connect('/'.$Routingprefix.'/casenotes/*', array('plugin'=>'cases','controller' => 'cases', 'action' => 'casenotes',$Routingprefix => true));
	
