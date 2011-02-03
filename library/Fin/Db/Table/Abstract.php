<?php

abstract class Fin_Db_Table_Abstract extends Zend_Db_Table_Abstract
{
    protected function _setupTableName()
    {
        $this->_name = 'fin_'.$this->_name;
        parent::_setupTableName();
    }
}
