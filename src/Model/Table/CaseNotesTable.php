<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class CaseNotesTable extends Table {
    public function initialize(array $config) {
    	$this->setTable('case_notes');
        $this->setPrimaryKey('id');
    }
}