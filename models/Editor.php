<?php

class Editor 
{
    private $_id;
    private $_name;
    private $_password;
    private $role;

    public function __construct(array $data)
    {
        $this->hydrate($data);
    }

        //hdratation
        
  public function hydrate(array $data){
    foreach ($data as $key => $value) {
      $method = 'set'.ucfirst($key);
      if (method_exists($this, $method)) {
        $this->$method($value);
      }
    }
  }
        //Setters

        public function setId($id)
        {
            $id = (int) $id;
            if($id > 0) {
                $this->_id = $id;
            }
        }

        public function setName($name)
        {
            if (is_string($name)) {
                $this->_name = $name;
            }
        }

        public function setPassword($password)
        {
            if (is_string($password)) {
                $this->_password = $password;
            }
        }

        public function setRole($role)
        {
            if (is_string($role)) {
                $this->_role = $role;
            }
        }




        // getters

        public function id()
        {
            return $this->_id;
        }

        public function name()
        {
            return $this->_name;
        }

        public function password()
        {
            return $this->_password;
        }

        
        public function role()
        {
            return $this->_role;
        }

}