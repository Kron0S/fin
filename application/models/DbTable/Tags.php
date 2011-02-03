<?php

class Application_Model_DbTable_Tags extends Fin_Db_Table_Abstract
{

    protected $_name = 'tags';
    protected $_dependentTables = array(
        'Application_Model_DbTable_Transactions2tags',
        'Application_Model_DbTable_Wishs',
    );
    protected $_referenceMap    = array(
        'User' => array(
            'columns'           => 'user_id',
            'refTableClass'     => 'Application_Model_DbTable_Users',
            'refColumns'        => 'id',
        ),
    );


}

