<?php

class Application_Model_DbTable_Transactions2tags extends Fin_Db_Table_Abstract
{

    protected $_name = 'transactions_tags';
    protected $_referenceMap    = array(
        'Tag' => array(
            'columns'           => 'tag_id',
            'refTableClass'     => 'Application_Model_DbTable_Tags',
            'refColumns'        => 'id',
        ),
        'Transaction' => array(
            'columns'           => 'transaction_id',
            'refTableClass'     => 'Application_Model_DbTable_Transactions',
            'refColumns'        => 'id',
        ),
    );


}

