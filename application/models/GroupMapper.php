<?php
class Application_Model_GroupMapper extends Fin_Model_Mapper
{
    public function __construct() {
        $this->setDbTable('Application_Model_DbTable_Groups');
    }
    public function save(Application_Model_Group $group)
    {
        $data = $group->getOptions();
        if (null === ($id = $group->getId())) {
            unset($data['id']);
            $group->setId($this->getDbTable()->insert($data));
        } else {
            $this->getDbTable()->update($data, array('id = ?' => $id));
        }
    }
    public function delete(Application_Model_Group $group){
        $id = $group->getId();
        if (empty($id)) {
            throw new Exception('Invalid model');
            return false;
        }
        $where = $this->getDbTable()
                      ->getAdapter()
                      ->quoteInto('id = ?', $id);
        $this->getDbTable()->delete($where);
    }
    public function find($id, Application_Model_Group $group)
    {
        $result = $this->getDbTable()->find($id);
        if (0 == count($result)) {
            return;
        }
        $row = $result->current();
        $group->setOptions($row->toArray());
    }
    public function fetchAll()
    {
        $resultSet = $this->getDbTable()->fetchAll();
        $entries   = array();
        foreach ($resultSet as $row) {
            $entry = new Application_Model_Group();
            $entry->setOptions($entry->toArray());
            $entries[] = $entry;
        }
        return $entries;
    }
}
