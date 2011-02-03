<?php

class Application_Model_DbTable_Users2accs extends Fin_Db_Table_Abstract
{

    protected $_name = 'users_accs';
    protected $_dependentTables = array(
        'Application_Model_DbTable_Types2usersaccs',
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
            'refColumns'        => 'id',
        ),
    );


}

