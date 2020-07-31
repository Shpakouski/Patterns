<?php

class Author
{
    public $name;

    public function __construct($name)
    {
        $this->name = $name;
    }
}

abstract class BookPrototype
{
    protected $title;
    protected $category;
    public $author;

    abstract public function __clone();

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @param mixed $author
     */
    public function setAuthor($author)
    {
        $this->author = $author;
        return $this;
    }
}

class StoryBookPrototype extends BookPrototype
{
    protected $category = 'Повесть';

    public function __clone()
    {
    }
}

$storyBook = new StoryBookPrototype();
$book1 = clone $storyBook;
$book1
    ->setAuthor(new Author('Пушкин'))
    ->setTitle('Пиковая дама');
print_r($book1);
