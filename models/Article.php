<?php

class Article 
{
    private $_id;
    private $_title;
    private $_content;
    private $_date;
    private $_categorieId;
    private $_editorId;

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

        public function setTitle($title)
        {
            if (is_string($title)) {
                $this->_title = $title;
            }
        }

        public function setContent($content)
        {
            if (is_string($content)) {
                $this->_content = $content;
            }
        }

        public function setDate($date)
        {

            $this->_date = $date;
        }


        public function setCategorieId($categorieId)
        {
            $categorieId = (int) $categorieId;
            if($categorieId > 0) {
                $this->_categorieId = $categorieId;
            }
        }

        public function setEditorId($editorId)
        {
            $editorId = (int) $editorId;
            if($editorId > 0) {
                $this->_editorId = $editorId;
            }
        }


        // getters

        public function id()
        {
            return $this->_id;
        }

        public function title()
        {
            return $this->_title;
        }

        public function content()
        {
            return $this->_content;
        }

        public function date()
        {
            return $this->_date;
        }

        public function categorieId()
        {
            return $this->_categorieId;
        }

        public function editorId()
        {
            return $this->_editorId;
        }

}