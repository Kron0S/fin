<?php

class Application_Model_DbTable_Types2usersaccs extends Fin_Db_Table_Abstract
{

    protected $_name = 'types_users_accs';
    protected $_referenceMap    = array(
        'Type' => array(
            'columns'           => 'type_id',
            'refTableClass'     => 'Application_Model_DbTable_Types',
            'refColumns'        => 'id',
        ),
        'Users2accs' => array(
            'columns'           => 'users_acc_id',
            'refTableClass'     => 'Application_Model_DbTable_Users2accs',
            'refColumns'        => 'id',
        ),
    );


}

