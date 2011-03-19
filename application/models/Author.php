<?php

class Model_Author
{
    private $name;
    private $nameKana;
    private $books;
    
    public function __construct($name, $nameKana)
    {
        $this->name     = $name;
        $this->nameKana = $nameKana;
        $this->books    = array();
    }
    
    public function getName()
    {
        return $this->name;
    }
    
    public function getNameKana()
    {
        return $this->nameKana;
    }
    
    public function getBooks()
    {
        return $this->books;
    }
    
    public function addBook(Model_Book $book)
    {
        $this->books[] = $book;
    }
}

