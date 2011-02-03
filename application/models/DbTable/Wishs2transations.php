<?php

class Application_Model_DbTable_Wishs2transations extends Fin_Db_Table_Abstract
{

    protected $_name = 'wishs_transactions';
    protected $_referenceMap    = array(
        'Wish' => array(
            'columns'           => 'wishs_id',
            'refTableClass'     => 'Application_Model_DbTable_Wishs',
            'refColumns'        => 'id',
        ),
        'Transaction' => array(
            'columns'           => 'transaction_id',
            'refTableClass'     => 'Application_Model_DbTable_Transactions',
            'refColumns'        => 'id',
        ),
    );


}

