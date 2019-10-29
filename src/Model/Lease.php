<?php


namespace App\Model;


use DateTime;

class Lease
{
    /** @var int */
    private $id;

    /** @var int */
    private $bookId;

    /** @var int */
    private $readerId;

    /** @var DateTime */
    private $from;

    /** @var DateTime */
    private $to;

    /** @var DateTime */
    private $deadline;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Lease
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return int
     */
    public function getBookId()
    {
        return $this->bookId;
    }

    /**
     * @param int $bookId
     * @return Lease
     */
    public function setBookId($bookId)
    {
        $this->bookId = $bookId;
        return $this;
    }

    /**
     * @return int
     */
    public function getReaderId()
    {
        return $this->readerId;
    }

    /**
     * @param int $readerId
     * @return Lease
     */
    public function setReaderId($readerId)
    {
        $this->readerId = $readerId;
        return $this;
    }

    /**
     * @return DateTime
     */
    public function getFrom()
    {
        return $this->from;
    }

    /**
     * @param DateTime $from
     * @return Lease
     */
    public function setFrom($from)
    {
        $this->from = $from;
        return $this;
    }

    /**
     * @return DateTime
     */
    public function getTo()
    {
        return $this->to;
    }

    /**
     * @param DateTime $to
     * @return Lease
     */
    public function setTo($to)
    {
        $this->to = $to;
        return $this;
    }

    /**
     * @return DateTime
     */
    public function getDeadline()
    {
        return $this->deadline;
    }

    /**
     * @param DateTime $deadline
     * @return Lease
     */
    public function setDeadline($deadline)
    {
        $this->deadline = $deadline;
        return $this;
    }


}