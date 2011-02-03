<?php
class Fin_Model
{
    protected $id, $create, $update, $showed, $orderby;
    public function __construct(array $options = null)
    {
        if (is_array($options)) {
            $this->setOptions($options);
        }
    }
    public function __set($name, $value)
    {
        $method = 'set' . $name;
        if (('mapper' == $name) || !method_exists($this, $method)) {
            throw new Exception('Invalid model property ' . $name);
        }
        $this->$method($value);
    }
    public function __get($name)
    {
        $method = 'get' . $name;
        if (('mapper' == $name) || !method_exists($this, $method)) {
            throw new Exception('Invalid model property ' . $name);
        }
        return $this->$method();
    }
    /**
     * Set all properties
     *
     * @param $options
     */
    public function setOptions(array $options)
    {
        $methods = get_class_methods($this);
        foreach ($options as $key => $value) {
            $method = 'set' . ucfirst($key);
            if (in_array($method, $methods)) {
                $this->$method($value);
            }
        }
        return $this;
    }
    /**
     * Get all properties with values
     *
     * @return $dataArray  key-value array 'property' => 'value'
     */
    public function getOptions() {
        $methods = get_class_methods($this);
        $dataArray = array();
        foreach ($methods as $m) {
            list($property) = sscanf($m, 'get%s');
            $property = strtolower($property);
            if(!empty($property) && property_exists($this, $property))
                $dataArray[$property] = $this->$m();
        }
        return $dataArray;
    }

    public function getId() {
        return $this->id;
    }
    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function getCreate() {
        return $this->create;
    }
    public function setCreate($create) {
        $this->create = $create;
        return $this;
    }

    public function getUpdate() {
        return $this->update;
    }
    public function setUpdate($update) {
        $this->update = $update;
        return $this;
    }

    public function getShowed() {
        return $this->showed;
    }
    public function setShowed($showed) {
        $this->showed = $showed;
        return $this;
    }

    public function getOrderby() {
        return $this->orderby;
    }
    public function setOrderby($orderby) {
        $this->orderby = $orderby;
        return $this;
    }

}