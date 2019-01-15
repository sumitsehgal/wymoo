<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class CasesTable extends Table {
    public function initialize(array $config) {
    	$this->table('cases');
        $this->primaryKey('id');
    }
}