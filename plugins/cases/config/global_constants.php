<?php
/***
 * This is core configuration file and part of Frontusers.
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


$config['case_status'] = array(	1 => array('title' => 'Case Created', 'description' => 'You may begin to edit your case information.'),
								2 =>  array('title' => 'Case Saved', 'description' => 'Case data saved.'),
								3 =>  array('title' => 'Case Submitted', 'description' => 'Case information received by investigator.  Investigation in progress.'),
								4 =>  array('title' => 'Case In Progress ', 'description' => 'Investigation in progress.  Report will be emailed to client on due date.'),
								5 =>  array('title' => 'Case Cancelled', 'description' => 'Case cancelled.  Payment not received.'),
								6 =>  array('title' => 'Case Closed', 'description' => 'Investigation complete.  Report emailed to client.'),
								7 =>  array('title' => 'Case On Hold' , 'description' => 'Case on hold.  Full payment required to proceed.')
								);
$config['case_icon'] = array(	1 => 'yellow.png', //You may begin to edit your case information.
								2 => 'yellow.png', //Case data saved.
								3 => 'blueicon.png', //Case information received by field investigator.  Investigation in progress.
								4 => 'green_bull.png', //Investigation in progress.  Report will be emailed to client on due date.
								5 => 'red_bull.png', //Case cancelled.  Payment not received.
								6 => 'black_bull.png', //Investigation complete.  Report emailed to client.
								7 =>'orange_bull.png' //Case on hold.  Full payment required to proceed.
								);
															
$config['service_level'] = array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19);
$config['case_fees'] = array(0=>'0',1=>'150',2=>'300',3=>'400',4=>'500',5=>'600',6=>'800',7=>'1000',8=>'1200',9=>'1400',10=>'1600',11=>'2000',12=>'2400',13=>'2800',14=>'3000',15=>'3400',16=>'3800',17=>'4200',18=>'5000',19=>'6000');
$config['discount'] = array(0=>0,1=>10,2=>15,3=>25);
$config['service_type'] = array(	1 => 'Investigation');
$config['due'] = array('on-or-before'=>'On or before','after'=>'After','on'=>'On');

								


