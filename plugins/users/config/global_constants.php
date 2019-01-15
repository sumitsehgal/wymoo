<?php
/***
 * This is core configuration file and part of User.
 *
 * Use it to configure core behavior of Cake.
 *
 * Copyright 2012, Gempulse Infotech Pvt. Ltd. (http://www.fullestop.com)
 *
 * @copyright Copyright 2010, Gempulse Infotech Pvt. Ltd. (http://www.fullestop.com)
 * @license MIT License (http://www.opensource.org/licenses/mit-license.php)
 *
 * PHP version 5
 * CakePHP version 1.3
 *
 */

$config['user_types'] = array(	
								'1' => 'Customer',//Access to create and modify case tracker information.
								'2' => 'Investigator', //Access to add case updates to open cases.
								'3' => 'Case Worker', //Access to case browser administrative tools.
								'4' => 'Administrator', //Full access to all administrative tools.
							
							);

