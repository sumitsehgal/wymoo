<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class CasesTable extends Table {
    public function initialize(array $config) {
    	$this->setTable('cases');
        $this->setPrimaryKey('id');

        $this->hasMany('CaseNotes', [
            'sort' => [
                'CaseNotes.created' => 'DESC'
            ]
        ]);

        // $this->hasMany('CaseNotifications', [
        //     'sort' => [
        //         'CaseNotifications.created' => 'DESC'
        //     ]
        // ])->setForeignKey('case_id')
        //     ->setCondition(['CaseNotifications.notification_type !=' => 'Investigator'] );
    }

}