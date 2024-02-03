<?php

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

    public function getRoomId(): int
    {
        return $this->roomId;
    }

    public function getAddress(): string
    {
        return $this->address;
    }

    public function __toString()
    {
        return 'Помещение №' . $this->roomId . ' в библиотеке по адресу: ' . $this->address;
    }

    // Метод получения объекта шкафа в помещении
    public function getBookShelf(): Shelf
    {
        return $this->bookShelf;
    }
}
