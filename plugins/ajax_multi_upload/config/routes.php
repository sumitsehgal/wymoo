<?php
/**
 * This file is part of AjaxMultiUpload.
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
/**
 * Here, we are connecting '/ajax-upload/*' (base path) to plugin ajax_multi_upload adn controller called 'Uploads',
 * its action called 'upload', and we pass a param to select the view file
 * to use (in this case, /app/plugins/ajax_multi_upload/views/uploads/upload.ctp)...
 */
	Router::connect('/ajax-upload/*', array('plugin'=>'ajax_multi_upload','controller' => 'uploads', 'action' => 'upload'));
/**
 * Here, we are connecting '/ajax-delete/*' (base path) to plugin ajax_multi_upload adn controller called 'Uploads',
 * its action called 'delete', and we pass a param to select the view file
 * to use (in this case, /app/plugins/ajax_multi_upload/views/uploads/delete.ctp)...
 */	
	Router::connect('/ajax-delete/*', array('plugin'=>'ajax_multi_upload','controller' => 'uploads', 'action' => 'delete'));


 /**
 * Routing.prefixes admin 
 */	
	$Routingprefix = 'admin';	

/**
 * Here, we are connecting 'admin/ajax-upload/*' (base path) to plugin ajax_multi_upload adn controller called 'Uploads' for Routing.prefixes admin,
 * its action called 'admin_upload', and we pass a param to select the view file
 * to use (in this case, /app/plugins/ajax_multi_upload/views/uploads/admin_upload.ctp)...
 */			 
	Router::connect('/'.$Routingprefix.'/ajax-upload/*', array('plugin'=>'ajax_multi_upload','controller' => 'uploads', 'action' => 'upload',$Routingprefix => true));
/**
 * Here, we are connecting 'admin/ajax-delete/*' (base path) to plugin ajax_multi_upload adn controller called 'Uploads' for Routing.prefixes admin,
 * its action called 'admin_delete', and we pass a param to select the view file
 * to use (in this case, /app/plugins/ajax_multi_upload/views/uploads/admin_delete.ctp)...
 */		
	Router::connect('/'.$Routingprefix.'/ajax-delete/*', array('plugin'=>'ajax_multi_upload','controller' => 'uploads', 'action' => 'delete',$Routingprefix => true));

	
