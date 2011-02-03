<?php

class Application_Model_DbTable_CurHistories extends Fin_Db_Table_Abstract
{

    protected $_name = 'cur_histories';
    protected $_referenceMap    = array(
        'Cur' => array(
            'columns'           => 'cur_id',
            'refTableClass'     => 'Application_Model_DbTable_Curs',
            'refColumns'        => 'id'
        ),
    );

}

