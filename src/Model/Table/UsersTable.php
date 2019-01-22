<?php
namespace App\Model\Table;

use Cake\ORM\Table;

class UsersTable extends Table
{
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('users');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
    }

    public function generatePassword($length = 6)
    {
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