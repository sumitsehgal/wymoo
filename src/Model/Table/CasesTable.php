<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class CasesTable extends Table {
    public function initialize(array $config) {
    	$this->setTable('cases');
        $this->setPrimaryKey('id');
    }
}