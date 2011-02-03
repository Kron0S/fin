<?php

class Application_Model_DbTable_Users extends Fin_Db_Table_Abstract
{

    protected $_name = 'users';
    protected $_dependentTables = array(
        'Application_Model_DbTable_Friends',
        'Application_Model_DbTable_Tags',
        'Application_Model_DbTable_Transactions',
        'Application_Model_DbTable_Users2accs',
        'Application_Model_DbTable_Wishs',
    );
    protected $_referenceMap    = array(
        'Group' => array(
            'columns'           => 'group_id',
            'refTableClass'     => 'Application_Model_DbTable_Groups',
            'refColumns'        => 'id',
        ),
        'Cur' => array(
            'columns'           => 'cur_id',
            'refTableClass'     => 'Application_Model_DbTable_Curs',
            'refColumns'        => 'id',
        ),
    );

}

