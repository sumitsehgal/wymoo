<?php
$config['case_icon'] = [
                        1 => 'yellow.png', //You may begin to edit your case information.
                        2 => 'yellow.png', //Case data saved.
                        3 => 'blueicon.png', //Case information received by field investigator.  Investigation in progress.
                        4 => 'green_bull.png', //Investigation in progress.  Report will be emailed to client on due date.
                        5 => 'red_bull.png', //Case cancelled.  Payment not received.
                        6 => 'black_bull.png', //Investigation complete.  Report emailed to client.
                        7 =>'orange_bull.png' //Case on hold.  Full payment required to proceed.
                    ];

$config['user_types'] = [
                        '1' => 'Customer',//Access to create and modify case tracker information.
                        '2' => 'Investigator', //Access to add case updates to open cases.
                        '3' => 'Case Worker', //Access to case browser administrative tools.
                        '4' => 'Administrator', //Full access to all administrative tools.
                    ];


$config['HTTP_HOST'] = $_SERVER['HTTP_HOST'];// 'www.wymoo.com';
if (substr($config['HTTP_HOST'],0,2) != 'www')
{
    $config['HTTP_HOST']  = 'www.'. $config['HTTP_HOST'] ;
}
$config['sites'] 		= array(
                            'www.wymoo.com'=>array(	
                                'WEBSITE_NAME' => 	'Wymoo® International - Background Checks &amp; Private Investigators',
                                'default_email'	=> 	array('name'=>'info','email'=>'noreply@wymoo.com'),
                                'noreply_email'	=> 	array('name'=>'noreply','email'=>'noreply@wymoo.com'),
                                'site_id'=>1,
                                'title'=>'Wymoo International',
                                'favicon'=>'wymoo.ico',
                                'logo'=>'logo'
                            ),
                            'www.russiapi.com'=>array(	
                                'WEBSITE_NAME' => 	'Russia PI™ - Russian Detectives - Russia Investigations',
                                'default_email'	=> 	array('name'=>'info','email'=>'noreply@russiapi.com'),
                                'noreply_email'	=> 	array('name'=>'noreply','email'=>'noreply@russiapi.com'),
                                'site_id'=>2,
                                'title'=>'Russia PI',
                                'favicon'=>'russiapi.ico',
                                'logo'=>'logo1'
                            ),
                            'www.philippinepi.com'=>array(	
                                'WEBSITE_NAME' => 	'Philippine PI™ - Philippines Investigation - Investigator Philippines',
                                'default_email'	=> 	array('name'=>'info','email'=>'noreply@philippinepi.com'),
                                'noreply_email'	=> 	array('name'=>'noreply','email'=>'noreply@philippinepi.com'),
                                'site_id'=>3,
                                'title'=>'Philippine PI',
                                'favicon'=>'philippinepi.ico',
                                'logo'=>'logo2'
                            ),
                            'www.wymoolocal.com'=>array(	
                                'WEBSITE_NAME' => 	'Wymoo® International - Background Checks &amp; Private Investigators',
                                'default_email'	=> 	array('name'=>'info','email'=>'noreply@wymoo.com'),
                                'noreply_email'	=> 	array('name'=>'noreply','email'=>'noreply@wymoo.com'),
                                'site_id'=>4,
                                'title'=>'Wymoo International',
                                'favicon'=>'wymoo.ico',
                                'logo'=>'logo'
                            ),
                            'www.wymoo.sejix.com'=>array(	
                                'WEBSITE_NAME' => 	'Wymoo® International - Background Checks &amp; Private Investigators',
                                'default_email'	=> 	array('name'=>'info','email'=>'noreply@wymoo.com'),
                                'noreply_email'	=> 	array('name'=>'noreply','email'=>'noreply@wymoo.com'),
                                'site_id'=>5,
                                'title'=>'Wymoo International',
                                'favicon'=>'wymoo.ico',
                                'logo'=>'logo'
                            ),
                        );
$config['all_sites'] = array(
                            1 => 'Wymoo',
                            2 =>  'Russia PI',
                            3 =>'Philippine PI',
                            4 => 'Wymoo',
                            5 => 'Wymoo'
                        );
$config['sites_id'] = array(
                            1 => array('display_name'=> 'Wymoo','site'=>'www.wymoo.com'),
                            2 => array('display_name'=> 'Russia PI','site'=>'www.russiapi.com'),
                            3 => array('display_name'=> 'Philippine PI','site'=>'www.philippinepi.com'),
                            4 => array('display_name'=> 'Wymoo','site'=>'wymoolocal.com'),
                            5 => array('display_name'=> 'Wymoo','site'=>'wymoo.sejix.com'),
                        );
                                                    
if(array_key_exists($_SERVER['HTTP_HOST'],$config['sites']))
{
    $config['HTTP_HOST'] = $_SERVER['HTTP_HOST'];	
}
                    
 $config['WEBSITE_NAME'] = $config['sites'][$config['HTTP_HOST']]['WEBSITE_NAME'];
 $config['default_email'] = $config['sites'][$config['HTTP_HOST']]['default_email'];
 $config['noreply_email'] = $config['sites'][$config['HTTP_HOST']]['noreply_email'];
 $config['favicon'] = $config['sites'][$config['HTTP_HOST']]['favicon'];
 $config['site_id'] = $config['sites'][$config['HTTP_HOST']]['site_id'];
 $config['title'] = $config['sites'][$config['HTTP_HOST']]['title'];
 $config['logo'] = $config['sites'][$config['HTTP_HOST']]['logo'];
                    
                    
 $config['defaultPaginationLimit'] = 5;
 $config['pagingViews'] = array( '10', '20', '50' );
                    
 $config['date_format'] = 'd.m.Y - H:i';
 $config['allinonelogin'] = false;

 $config['case_status'] = array(	1 => array('title' => 'Case Created', 'description' => 'You may begin to edit your case information.'),
								2 =>  array('title' => 'Case Saved', 'description' => 'Case data saved.'),
								3 =>  array('title' => 'Case Submitted', 'description' => 'Case information received by investigator.  Investigation in progress.'),
								4 =>  array('title' => 'Case In Progress ', 'description' => 'Investigation in progress.  Report will be emailed to client on due date.'),
								5 =>  array('title' => 'Case Cancelled', 'description' => 'Case cancelled.  Payment not received.'),
								6 =>  array('title' => 'Case Closed', 'description' => 'Investigation complete.  Report emailed to client.'),
								7 =>  array('title' => 'Case On Hold' , 'description' => 'Case on hold.  Full payment required to proceed.')
                                );
                                
$config['AMU'] = array('directory'=> '/var/www/html/wymooGit/wymoo/webroot/Php_data'. DS.'uploads'. DS.'files','filesizeMB'=>'10');

															
$config['service_level'] = array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19);
$config['case_fees'] = array(0=>'0',1=>'150',2=>'300',3=>'400',4=>'500',5=>'600',6=>'800',7=>'1000',8=>'1200',9=>'1400',10=>'1600',11=>'2000',12=>'2400',13=>'2800',14=>'3000',15=>'3400',16=>'3800',17=>'4200',18=>'5000',19=>'6000');
$config['discount'] = array(0=>0,1=>10,2=>15,3=>25);
$config['service_type'] = array(	1 => 'Investigation');
$config['due'] = array('on-or-before'=>'On or before','after'=>'After','on'=>'On');

return $config;

?>