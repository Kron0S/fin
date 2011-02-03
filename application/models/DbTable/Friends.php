<?php

class Application_Model_DbTable_Friends extends Fin_Db_Table_Abstract
{

    protected $_name = 'friends';
    protected $_referenceMap    = array(
        'User' => array(
            'columns'           => 'user_id',
            'refTableClass'     => 'Application_Model_DbTable_Users',
            'refColumns'        => 'id',
        ),
        'Friend' => array(
            'columns'           => 'friend_id',
            'refTableClass'     => 'Application_Model_DbTable_Users',
            'refColumns'        => 'id',
        ),
    );


}

