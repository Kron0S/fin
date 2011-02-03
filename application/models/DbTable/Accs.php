<?php

class Application_Model_DbTable_Accs extends Fin_Db_Table_Abstract
{

    protected $_name = 'accs';
    protected $_dependentTables = array(
        'Application_Model_DbTable_Transactions',
        'Application_Model_DbTable_Users2accs',
    );
    protected $_referenceMap    = array(
        'Cur' => array(
            'columns'           => 'cur_id',
            'refTableClass'     => 'Application_Model_DbTable_Curs',
            'refColumns'        => 'id',
        ),
    );


}

