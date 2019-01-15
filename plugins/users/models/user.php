<?php
/**
 * Copyright 2010, Cake Development Corporation (http://cakedc.com)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright 2010, Cake Development Corporation (http://cakedc.com)
 * @license MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

/**
 * Users Plugin User Model
 *
 * @package users
 * @subpackage users.models
 */
class User extends UsersAppModel {

/**
 * Name
 *
 * @var string
 */
	public $name = 'User';

/**
 * Behaviors
 *
 * @var array
 */
	public $actsAs = array('Containable', 'MultiValidatable', 'Search.Searchable', 'Utils.Sluggable' => array(
			'label' => 'username',
			'method' => 'multibyteSlug'));
/**
 * hasOne associations
 *
 * @var array
 */
	public $hasOne = array(
		'CaseTable' => array(
			'className' => 'Cases.CaseTable',
			'foreign_key' => 'user_id'));


/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array('UserType');
/**
 * Additional Find methods
 *
 * @var array
 */
	public $_findMethods = array('search' => true);

/**
 * @todo comment me
 *
 * @var array
 */
	public $filterArgs = array(
		array('name' => 'username', 'type' => 'string'),
		array('name' => 'email', 'type' => 'string'),
		array('name' => 'role', 'type' => 'string'),
		array('name' => 'lname', 'type' => 'string'),
		array('name' => 'fname', 'type' => 'string')
		);

/**
 * Displayfield
 *
 * @var string $displayField
 */
	public $displayField = 'username';

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
		parent::__construct($id, $table, $ds);
		$this->validate = array(
			'username' => array(
				'required' => array(
					'rule' => array('notEmpty'),
					'required' => true, 'allowEmpty' => false,
					'message' => __d('users', 'Please enter a username', true)),
				
				'unique_username' => array(
					'rule'=>array('isUnique','username'),
					'message' => __d('users', 'This username is already in use.', true)),
				'username_min' => array(
					'rule' => array('minLength', '3'),
					'message' => __d('users', 'The username must have at least 3 characters.', true))),
			'email' => array(
				'isValid' => array(
					'rule' => 'email',
					'required' => true,
					'message' => __d('users', 'Please enter a valid email address.', true)),
				'isUnique' => array(
					'rule' => array('isUnique','email'),
					'message' => __d('users', 'This email is already in use.', true))),
			'password' => array(
				'to_short' => array(
					'rule' => array('minLength', '6'),
					'message' => __d('users', 'The password must have at least 6 characters.', true)),
				'required' => array(
					'rule' => 'notEmpty',
					'message' => __d('users', 'Please enter a password.', true))),
			'temppassword' => array(
				'rule' => 'confirmPassword',
				'message' => __d('users', 'The passwords are not equal, please try again.', true)));
				
				
				 $this->validationSets = array(
        'admin_myaccount' => array(
            'fname' => array('required' => array('rule' => 'notEmpty', 'required' => true, 'message' => __('This field cannot be left blank, please try again.', true),'last'=>true),
									'isValid' => array('rule' => '/[A-Za-z ]+/', 'required' => true, 'message' => __('Only letters and spaces allowed, please try again.', true))),
            'lname' => array('required' => array('rule' => 'notEmpty', 'required' => true, 'message' => __('This field cannot be left blank, please try again.', true),'last'=>true),
									'isValid' => array('rule' => '/[A-Za-z ]+/', 'required' => true, 'message' => __('Only letters and spaces allowed, please try again.', true))),
            'email' => array('isValid' => array('rule' => 'email', 'required' => true, 'message' => __('Must be a valid email address.', true),'last'=>true),
									'isUnique' => array('rule' => array('isUnique', 'email'), 'message' => __('This email is already in use.', true))),
            'username' => array('required' => array('rule' => 'notEmpty', 'required' => true, 'message' => __('This field cannot be left blank, please try again.', true),'last'=>true),
									'isUnique' => array('rule' => array('isUnique', 'username'), 'message' => __('This username is already in use.', true))),
            'password' => array('required' => array('rule' => 'notEmpty', 'required' => true, 'message' => __('This field cannot be left blank, please try again.', true),'last'=>true),
			'CompareWithOldPassword' => array('rule' => array('CompareWithOldPassword','password'), 'message' => __('Current password does not match, please try again.', true))),
            'newpassword' => array('validpassword' => array('rule' => array('between', 6, 15),  'required' => true, 'allowEmpty' => true, 'message' => __('Passwords must be between 6 and 15 characters long.', true))),
						

        ),
        'admin_add' => array(
            'fname' => array('required' => array('rule' => 'notEmpty', 'required' => true, 'message' => __('This field cannot be left blank, please try again.', true),'last'=>true),
									'isValid' => array('rule' => '/[A-Za-z ]+/', 'required' => true, 'message' => __('Only letters and spaces allowed, please try again.', true))),
            'lname' => array('required' => array('rule' => 'notEmpty', 'required' => true, 'message' => __('This field cannot be left blank, please try again.', true),'last'=>true),
									'isValid' => array('rule' => '/[A-Za-z ]+/', 'required' => true, 'message' => __('Only letters and spaces allowed, please try again.', true))),
            'email' => array('isValid' => array('rule' => 'email', 'required' => true, 'message' => __('Must be a valid email address.', true),'last'=>true),
									'isUnique' => array('rule' => array('isUnique', 'email'), 'message' => __('This email is already in use.', true))),
            'username' => array('required' => array('rule' => 'notEmpty', 'required' => true, 'message' => __('This field cannot be left blank, please try again.', true),'last'=>true),
									'isUnique' => array('rule' => array('isUnique', 'username'), 'message' => __('This username is already in use.', true))),
            'newpassword' => array('validpassword' => array('rule' => array('between', 6, 15),  'required' => true, 'message' => __('Passwords must be between 6 and 15 characters long.', true))
			),
            'temppassword' => array('CompareWithOldPassword' => array('rule' => array('CompareWithOldPassword','newpassword'), 'message' => __('password does not match, please try again.', true))),
						

        ),
		'forgotpassword' => array(
            'client_email' => array('required' => array('rule' => 'notEmpty', 'required' => true, 'message' => __('This field cannot be left blank, please try again.', true),'last'=>true),
			'isValid' => array('rule' => 'email', 'message' => __('Must be a valid email address.', true))),
						

        ),
       
    );

		
	}


/**
 * After save callback
 *
 * @param boolean $created
 * @return void
 */
	public function afterSave($created) {
		if ($created) {
			if (!empty($this->data[$this->alias]['slug'])) {
				if ($this->hasField('url')) {
					$this->saveField('url', '/user/' . $this->data[$this->alias]['slug'], false);
				}
			}
		}
		if(!empty($this->data[$this->alias]['fname']) && !empty($this->data[$this->alias]['lname'])){
		$this->Query("UPDATE `cases` SET `client_fname` = '".$this->data[$this->alias]['fname']."', 
										`client_lname` = '".$this->data[$this->alias]['lname']."',
										`client_email` = '".$this->data[$this->alias]['email']."',
										`client_login_id` = '".$this->data[$this->alias]['username']."' 
					WHERE `cases`.`user_id` =".$this->id);
		}
	}

/**
 * Before save callback
 *
 * @param boolean $created
 * @return void
 */
	public function beforeSave() {
		//pr($this->data);
		if (!empty($this->data[$this->alias]['password_token'])) {
			if ($this->hasField('password_token')) {
				$this->data[$this->alias]['password_token']= $this->_encrypt($this->data[$this->alias]['password_token']);
				
			}
		}
		
		//pr($this->data);exit;
		return true;
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
		foreach ($results as & $row) {
			if(isset($row['User']['password_token'])) {
				$row['User']['password_token'] =  $this->_decrypt($row['User']['password_token']);
			}
			
			
		}
		return $results;
	}

/**
 * Custom validation method to ensure that the two entered passwords match
 *
 * @param string $password Password
 * @return boolean Success
 */
	public function confirmPassword($password = null) {
		if ((isset($this->data[$this->alias]['password']) && isset($password['temppassword']))
			&& !empty($password['temppassword'])
			&& ($this->data[$this->alias]['password'] === $password['temppassword'])) {
			return true;
		}
		return false;
	}




	function saveDetail($user_id,$postData){
		
	
	}
	
	function CompareWithOldPassword($data,$field){
		
		if($this->data[$this->alias]['temppassword']!='' && $this->data[$this->alias][$field]!='' ){
			return ($this->data[$this->alias][$field]==$this->data[$this->alias]['temppassword']);
		}
		return false;
	
	}
	function generatePassword ($length = 6){
	
		$password = "";
		$possible = "2346789BCDFGHJKLMNPQRTVWXYZ";
		$maxlength = strlen($possible);
		if ($length > $maxlength) {
		  $length = $maxlength;
		}
		$i = 0; 
		while ($i < $length) { 
	
		  $char = substr($possible, mt_rand(0, $maxlength-1), 1);
			
		  if (!strstr($password, $char)) { 
			$password .= $char;
			$i++;
		  }
	
		}
		return $password;
	}


}
