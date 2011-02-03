<?php

class Application_Model_DbTable_Types extends Fin_Db_Table_Abstract
{

    protected $_name = 'types';
    protected $_dependentTables = array(
        'Application_Model_DbTable_Transactions',
        'Application_Model_DbTable_Types2usersaccs',
    );


}

