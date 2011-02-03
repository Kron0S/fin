<?php

class Application_Model_Group extends Fin_Model
{
    protected $name, $desc;
    public function getName() {
        return $this->name;
    }
    public function setName($name) {
        $this->name = $name;
        return $this;
    }
}