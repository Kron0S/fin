<?php

class Application_Model_DbTable_Groups extends Fin_Db_Table_Abstract
{

    protected $_name = 'groups';
    protected $_dependentTables = array(
        'Application_Model_DbTable_Users'
    );


}

