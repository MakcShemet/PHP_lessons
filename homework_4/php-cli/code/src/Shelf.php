﻿<?php

class Shelf
{

    private int $shelfId;
    private int $roomId;
    private int $volume;
    private array $books;

    public function __construct(int $shelfId, int $roomId, int $volume, array $books)
    {
        $this->shelfId = $shelfId;
        $this->roomId = $roomId;
        $this->volume = $volume;
        $this->books = $books;
    }

    public function getShelfId(): int
    {
        return $this->shelfId;
    }

    public function getRoomId(): int
    {
        return $this->roomId;
    }

    public function getVolume(): int
    {
        return $this->volume;
    }

    public function getBooksFromShelf(): array
    {
        return $this->books;
    }

    public function getCountBooks()
    {
        return count($this->books);
    }

    public function placeBookInShelf(PaperBook $book)
    {
        $shelfIdForBook = $book->getShelfId();
        if ($this->getShelfId() === $shelfIdForBook && count($this->books) < $this->getVolume()) {
            $this->books[] = $book;
        } else {
            echo 'Шкаф № ' . $this->getShelfId() . ' переполнен. Положите книгу "' . $book->getName() . '" в другой шкаф' . PHP_EOL;
        }
    }
}
