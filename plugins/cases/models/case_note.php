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

class CaseNote extends CasesAppModel {

/**
 * Name
 *
 * @var string
 */
	public $name = 'CaseNote';
	
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
		array('name' => 'case_notes', 'type' => 'string'),
		array('name' => 'created_by', 'type' => 'string')
		
		);

/**
 * Displayfield
 *
 * @var string $displayField
 */
	public $displayField = 'case_notes';

/**
 * Virtualfields
 *
 * @var string $virtualfields
 */
	public $virtualFields = array('created_by'=>'SELECT CONCAT(User.fname, " ", User.lname) FROM users as User WHERE User.id=CaseNote.creator_id');
	




		

/**
 * Validation parameters
 *
 * @var array
 */
	public $validate = array();

/**
 * Constructor
 *
 * @param string $id ID
 * @param string $table Table
 * @param string $ds Datasource
 */
	public function __construct($id = false, $table = null, $ds = null) {
		parent::__construct($id, $table, $ds);	
	}
 


}
