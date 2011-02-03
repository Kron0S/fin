<?php

class Application_Model_DbTable_Transactions extends Fin_Db_Table_Abstract
{

    protected $_name = 'transactions';
    protected $_dependentTables = array(
        'Application_Model_DbTable_Transactions2tags',
        'Application_Model_DbTable_Wishs2transations',
    );
    protected $_referenceMap    = array(
        'User' => array(
            'columns'           => 'user_id',
            'refTableClass'     => 'Application_Model_DbTable_Users',
            'refColumns'        => 'id',
        ),
        'Acc' => array(
            'columns'           => 'acc_id',
            'refTableClass'     => 'Application_Model_DbTable_Accs',
            'refColumns'        => 'id'
        ),
        'User2' => array(
            'columns'           => 'user2_id',
            'refTableClass'     => 'Application_Model_DbTable_Users',
            'refColumns'        => 'id',
        ),
        'Acc2' => array(
            'columns'           => 'acc2_id',
            'refTableClass'     => 'Application_Model_DbTable_Accs',
            'refColumns'        => 'id'
        ),
        'Type' => array(
            'columns'           => 'type_id',
            'refTableClass'     => 'Application_Model_DbTable_Types',
            'refColumns'        => 'id'
        ),
    );


}

