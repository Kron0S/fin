<?php

class Application_Model_DbTable_Wishs extends Fin_Db_Table_Abstract
{

    protected $_name = 'wishs';
    protected $_dependentTables = array(
        'Application_Model_DbTable_Wishs2transations',
    );
    protected $_referenceMap    = array(
        'User' => array(
            'columns'           => 'user_id',
            'refTableClass'     => 'Application_Model_DbTable_Users',
            'refColumns'        => 'id',
        ),
        'Tag' => array(
            'columns'           => 'tag_id',
            'refTableClass'     => 'Application_Model_DbTable_Tags',
            'refColumns'        => 'id',
        ),
    );


}

