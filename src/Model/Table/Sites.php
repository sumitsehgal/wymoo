<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class SitesTable extends Table {
    public function initialize(array $config) {
    	$this->setTable('sites');
        $this->setPrimaryKey('id');
    }
}