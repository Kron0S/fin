<?php

class Application_Model_DbTable_Curs extends Fin_Db_Table_Abstract
{

    protected $_name = 'curs';
    protected $_dependentTables = array(
        'Application_Model_DbTable_Accs',
        'Application_Model_DbTable_CurHistories',
        'Application_Model_DbTable_Users',
    );



}

