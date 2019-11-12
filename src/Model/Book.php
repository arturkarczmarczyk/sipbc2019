<?php


namespace App\Model;


class Book extends Model
{
    /** @var int */
    private $id;

    /** @var string */
    private $title;

    /** @var string */
    private $author;

    /** @var int */
    private $year;

    /** @var string */
    private $location;

    public function __construct($id = null)
    {
        if ($id && is_numeric($id) && $id > 0) {
            $dbh = self::getConnection();
            $sql = "SELECT * FROM book WHERE id = $id";
            $result = $dbh->query($sql);
            $resultArray = $result->fetch();

            $this->setId($resultArray['id']);
            $this->setTitle($resultArray['title']);
            $this->setAuthor($resultArray['author']);
            $this->setYear($resultArray['year']);
            $this->setLocation($resultArray['location']);
        }
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Book
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return Book
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param string $author
     * @return Book
     */
    public function setAuthor($author)
    {
        $this->author = $author;
        return $this;
    }

    /**
     * @return int
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * @param int $year
     * @return Book
     */
    public function setYear($year)
    {
        $this->year = $year;
        return $this;
    }

    /**
     * @return string
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @param string $location
     * @return Book
     */
    public function setLocation($location)
    {
        $this->location = $location;
        return $this;
    }

    /**
     * @return Book[]
     */
    public static function fetchAll()
    {
        $dbh = self::getConnection();

        $books = [];
        foreach($dbh->query('SELECT * from book') as $row) {
            $book = new Book();
            $book
                ->setId($row['id'])
                ->setTitle($row['title'])
                ->setAuthor($row['author'])
                ->setYear($row['year'])
                ->setLocation($row['location'])
            ;
            $books[] = $book;
        }
        $dbh = null;

        return $books;
    }

    /**
     * Save book to database.
     */
    public function save()
    {
        // polacz z baza danych
        $dbh = self::getConnection();

        // sprawdz czy jest ID
        if (! $this->getId()) {
            // insert nowy jesli nie ma ID
            $sql = "INSERT INTO book(title, author, year, location) VALUES ('{$this->getTitle()}', '{$this->getAuthor()}', '{$this->getYear()}', '{$this->getLocation()}')";
            $dbh->query($sql);
        } else {
            // update istniejacego jesli jest ID
            $sql = "UPDATE book SET title='{$this->getTitle()}', author='{$this->getAuthor()}', year={$this->getYear()}, location = '{$this->getLocation()}' WHERE id={$this->getId()}";
            $dbh->query($sql);
        }
    }
}