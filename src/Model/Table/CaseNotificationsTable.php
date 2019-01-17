<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class CaseNotificationsTable extends Table {
    public function initialize(array $config) {
    	$this->setTable('case_notifications');
        $this->setPrimaryKey('id');
    }
}