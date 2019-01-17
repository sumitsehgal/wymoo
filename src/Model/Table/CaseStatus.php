<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class CaseStatusTable extends Table {
    public function initialize(array $config) {
    	$this->setTable('case_statuses');
        $this->setPrimaryKey('id');
    }
}