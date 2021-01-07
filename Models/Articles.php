<?php
namespace App\Models;

class Articles extends Model
{

    protected $id;
    protected $title;
    protected $content;
    protected $date;
    protected $categorieId;
    protected $editorId;


    public function __construct()
    {
        $this->table = 'articles';
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of title
     */ 
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the value of title
     *
     * @return  self
     */ 
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get the value of content
     */ 
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set the value of content
     *
     * @return  self
     */ 
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get the value of date
     */ 
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set the value of date
     *
     * @return  self
     */ 
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get the value of categorieId
     */ 
    public function getCategorieId()
    {
        return $this->categorieId;
    }

    /**
     * Set the value of categorieId
     *
     * @return  self
     */ 
    public function setCategorieId($categorieId)
    {
        $this->categorieId = $categorieId;

        return $this;
    }

    /**
     * Get the value of editorId
     */ 
    public function getEditorId()
    {
        return $this->editorId;
    }

    /**
     * Set the value of editorId
     *
     * @return  self
     */ 
    public function setEditorId($editorId)
    {
        $this->editorId = $editorId;

        return $this;
    }
}