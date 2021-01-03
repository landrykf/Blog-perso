<?php

class Image 
{
    private $_id;
    private $_name;
    private $_link;


    public function __construct(array $data)
    {
        $this->hydrate($data);
    }

        //hydratation
        
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

        public function setLink($link)
        {
            if (is_string($link)) {
                $this->_link = $link;
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

        public function link()
        {
            return $this->_link;
        }


}