<?php
/**
 * Frontusers Plugin User Model File
 *
 * Copyright 2012, Gempulse Infotech Pvt. Ltd. (http://www.fullestop.com)
 *
 * @copyright Copyright 2010, Gempulse Infotech Pvt. Ltd. (http://www.fullestop.com)
 * @license MIT License (http://www.opensource.org/licenses/mit-license.php)
 *
 * PHP version 5
 * CakePHP version 1.3
 *
 * @package    frontusers
 * @subpackage users.models
 * @copyright  2012-2013 Manmohan Singh Meena <manmohan.meena@fullestop.com>
 * @license    http://www.opensource.org/licenses/mit-license.php The MIT License
 * @link       http://www.fullestop.com/manmohanmeena/frontusers
 */

class CaseTable extends CasesAppModel {

/**
 * Name
 *
 * @var string
 */
	public $name = 'CaseTable';
	public $useTable = 'cases';
	//public $recursive = 2;

/**
 * Behaviors
 *
 * @var array
 */
	public $actsAs = array('Containable', 'MultiValidatable', 'Search.Searchable', 'Utils.Sluggable' => array(
			'label' => 'name',
			'method' => 'multibyteSlug'));

/**
 * Additional Find methods
 *
 * @var array
 */
	public $_findMethods = array('search' => true);

/**
 * Additional Filter arugments
 *
 * @var array
 */
	public $filterArgs = array(
		array('name' => 'username', 'type' => 'string'),
		array('name' => 'site_id', 'type' => 'value')
		);

/**
 * Displayfield
 *
 * @var string $displayField
 */
	public $displayField = 'id';

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'CaseNote' => array(
			'className' => 'Cases.CaseNote',
			'order' => 'CaseNote.created DESC',
			'foreign_key' => 'case_id'),
	//	'CaseDocument',
		'Communication'=>array(
			'className' => 'Cases.CaseNotification',
			'conditions' => array('Communication.notification_type !=' => 'Investigator'),
			'order' => 'Communication.created DESC',
			'virtualFields'=>array('created_by'=>'SELECT CONCAT(User.fname, " ", User.lname) FROM users as User WHERE User.id=Communication.creator_id'), 			
			'foreign_key' => 'case_id') ,
		'InvestigatorNote'=>array(
			'className' => 'Cases.CaseNotification',
			'conditions' => array('InvestigatorNote.notification_type' => 'Investigator'),
			'order' => 'InvestigatorNote.created DESC',
			'virtualFields'=>array('created_by'=>'SELECT CONCAT(User.fname, " ", User.lname) FROM users as User WHERE User.id=InvestigatorNote.creator_id'), 
			'foreign_key' => 'case_id') 	
		);
/**
 * hasOne associations
 *
 * @var array
 */
	public $hasOne = array(
		'Quote' => array(
			'className' => 'Quote',
			'foreign_key' => 'case_id'));			

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'User' => array(
			'className' => 'Users.User',
			'foreign_key' => 'user_id'),
		'Site','CaseStatus'	=>array('className' => 'Cases.CaseStatus'));			

/**
 * Validation parameters
 *
 * @var array
 */
	public $validate = array();
	
	public $validationSets = array();


/**
 * Constructor
 *
 * @param string $id ID
 * @param string $table Table
 * @param string $ds Datasource
 */
	public function __construct($id = false, $table = null, $ds = null) {
		 $this->validationSets = array(
        'edit_case' => array(
            'client_fname' => array('required' => array('rule' => 'notEmpty', 'required' => true, 'message' => __('This field cannot be left blank, please try again.', true),'last'=>true),
									'isValid' => array('rule' => '/[A-Za-z ]+/', 'required' => true, 'message' => __('Only letters and spaces allowed, please try again.', true))),
            'client_lname' => array('required' => array('rule' => 'notEmpty', 'required' => true, 'message' => __('This field cannot be left blank, please try again.', true),'last'=>true),
									'isValid' => array('rule' => '/[A-Za-z ]+/', 'required' => true, 'message' => __('Only letters and spaces allowed, please try again.', true))),
            'client_email' => array('isValid' => array('rule' => 'email', 'required' => true, 'message' => __('Must be a valid email address.', true),'last'=>true),
									'isUnique' => array('rule' => array('isUnique', 'client_email'), 'message' => __('This email is already in use.', true))),
			 'subject_fullname' => array('rule' => '/[A-Za-z ]+/', 'required' => true, 'allowEmpty' => true, 'message' => __('Only letters and spaces allowed, please try again.', true)),
			 'subject_email' => array('rule' => 'email', 'required' => true, 'allowEmpty' => true, 'message' => __('Must be a valid email address.', true))	,					
			 'subject_phone' => array('rule' => array('phone', '/^\s*[+().\-0-9ext ]*$/i'), 'required' => true, 'allowEmpty' => true, 'message' => __('Must be a valid phone number.', true))	,					
			 			
			 		
			 'subject_background' => array('rule' => array('validateDescription'), 'required' => true, 'allowEmpty' => true, 'message' => __('You can not enter more then 1000 characters', true)),						
						

        ),
        'case_tracker' => array(
            'client_fname' => array('required' => array('rule' => 'notEmpty', 'required' => true, 'message' => __('This field cannot be left blank, please try again.', true),'last'=>true),
									'isValid' => array('rule' => '/[A-Za-z ]+/', 'required' => true, 'message' => __('Only letters and spaces allowed, please try again.', true))),
            'client_lname' => array('required' => array('rule' => 'notEmpty', 'required' => true, 'message' => __('This field cannot be left blank, please try again.', true),'last'=>true),
									'isValid' => array('rule' => '/[A-Za-z ]+/', 'required' => true, 'message' => __('Only letters and spaces allowed, please try again.', true))),
            'client_login_id' => array('isValid' => array('rule' => 'notEmpty', 'required' => true, 'message' => __('This field cannot be left blank, please try again.', true),'last'=>true),
									'isUnique' => array('rule' => array('isUnique', 'client_login_id'), 'message' => __('This login id is already in use.', true))),
			
            'password_token' => array('isValid' => array('rule' => array('minLength', 6), 'required' => true, 'message' => __('Must be at least 6 characters.', true),'last'=>true))
			
			
						

        ),
		'notify'	=> array('notification' => array(
		'required' => array('rule' => 'notEmpty', 'required' => true, 'message' => __('Please enter value for notification.', true)),
		'valid' => array('rule' => array('validateNotification'), 'required' => true, 'allowEmpty' => true, 'message' => __('You can not enter more then 1500 characters', true)),
		
		)),
		'notes'	=> array('notes' => array('rule' => 'notEmpty', 'required' => true, 'message' => __('Please enter value for notes.', true)))
    );
		parent::__construct($id, $table, $ds);	
	}
 /**
 * afterFind callback
 *
 * @param array $results Result data
 * @param mixed $primary Primary query
 * @return array
 */
	public function afterFind($results, $primary = false) {
		//pr($results);
		/*foreach ($results as & $row) {	
			$client = $this->User->findById($row['CaseTable']['user_id']);
			$row['CaseTable']['client'] = $client;
			if (isset($row['CaseNote']) && (is_array($row))) {
				if (!empty($row['CaseNote'])) {
					foreach ($row['CaseNote'] as $key => $notes) {
						$creator = $this->User->findById($notes['creator_id']);
						$row['CaseNote'][$key]['creator'] = $creator['User'];
					}
				} 	
			}
		}*/
		return $results;
	}
	

	
public function validateDescription(array $data) {
    $value = current($data);
	if($value){
		$len =  strlen(str_replace("\n",'',$value));
		if($len > 1000){
			return false;
		}
    	
	} 
	return true;
}
public function validateNotification(array $data) {
    $value = current($data);
	if($value){
		$len =  strlen(str_replace("\n",'',$value));
		if($len > 1500){
			return false;
		}
    	
	} 
	return true;
}


}
