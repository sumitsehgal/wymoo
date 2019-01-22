<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class QuotesTable extends Table {
    public function initialize(array $config) {
    	$this->setTable('quotes');
        $this->setPrimaryKey('id');
    }

}