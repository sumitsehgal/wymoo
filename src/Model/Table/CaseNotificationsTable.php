<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class CaseNotificationsTable extends Table {
    public function initialize(array $config) {
    	$this->setTable('case_notifications');
        $this->setPrimaryKey('id');

        // $this->addBehavior('Timestamp');  // It is asking for Timestamps. Don't want to change the DB
    }
}