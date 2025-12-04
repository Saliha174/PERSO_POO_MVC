<?php

class Model
{
    protected $id;

    public function __construct($id)
    {
        $this->id = $id;
    }



    public function getId()
    {
        return $this->id;;
    }
    public function setId($id)
    {
        return $this->id = (int)$id;
    }
}
