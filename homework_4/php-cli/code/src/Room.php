<?php

require_once 'Shelf.php';

class Room
{
    private int $roomId;
    private string $address;
    private Shelf $bookShelf;

    public function __construct($roomId, $address, Shelf $bookShelf)
    {
        $this->roomId = $roomId;
        $this->address = $address;
        $this->bookShelf = new Shelf($bookShelf->getShelfId(), $bookShelf->getRoomId(), $bookShelf->getVolume(), $bookShelf->getBooksFromShelf());
    }

    public function getRoomId()
    {
        return $this->roomId;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function getBookShelf()
    {
        return $this->bookShelf;
    }
}
