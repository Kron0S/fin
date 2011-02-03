<?php

class GroupsController extends Zend_Controller_Action
{

    public function init()
    {
    }

    public function indexAction()
    {
        //$this->view->headTitle('Список статей');
        $group = new Application_Model_GroupMapper();
        $this->view->entries = $group->fetchAll();
        //$this->render('backend/index', null, true);
    }

    public function addAction()
    {
    }

    public function editAction()
    {
    }

    public function removeAction()
    {
    }


}
