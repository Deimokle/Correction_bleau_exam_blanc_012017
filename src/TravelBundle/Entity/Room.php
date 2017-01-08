<?php

namespace TravelBundle\Entity;

/**
 * Room
 */
class Room
{
    public function __toString()
    {
        return 'room';
    }
    //generate code
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $roomNumber;

    /**
     * @var integer
     */
    private $capacity;

    /**
     * @var boolean
     */
    private $book;

    /**
     * @var \TravelBundle\Entity\Hotel
     */
    private $hotel;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set roomNumber
     *
     * @param string $roomNumber
     *
     * @return Room
     */
    public function setRoomNumber($roomNumber)
    {
        $this->roomNumber = $roomNumber;

        return $this;
    }

    /**
     * Get roomNumber
     *
     * @return string
     */
    public function getRoomNumber()
    {
        return $this->roomNumber;
    }

    /**
     * Set capacity
     *
     * @param integer $capacity
     *
     * @return Room
     */
    public function setCapacity($capacity)
    {
        $this->capacity = $capacity;

        return $this;
    }

    /**
     * Get capacity
     *
     * @return integer
     */
    public function getCapacity()
    {
        return $this->capacity;
    }

    /**
     * Set book
     *
     * @param boolean $book
     *
     * @return Room
     */
    public function setBook($book)
    {
        $this->book = $book;

        return $this;
    }

    /**
     * Get book
     *
     * @return boolean
     */
    public function getBook()
    {
        return $this->book;
    }

    /**
     * Set hotel
     *
     * @param \TravelBundle\Entity\Hotel $hotel
     *
     * @return Room
     */
    public function setHotel(\TravelBundle\Entity\Hotel $hotel = null)
    {
        $this->hotel = $hotel;

        return $this;
    }

    /**
     * Get hotel
     *
     * @return \TravelBundle\Entity\Hotel
     */
    public function getHotel()
    {
        return $this->hotel;
    }
}
