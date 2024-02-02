<?php

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

    public function setVolume(int $volume): void
    {
        $this->volume = $volume;
    }

    public function addBook(PaperBook $book)
    {
        $shelfIdForBook = $book->getShelfId();
        if ($shelfIdForBook === $this->shelfId && $this->getVolume() !== 0 && $this->getRoomId()) {
            $this->books[] = $book;
            // $this->volume->setVolume(--$shelfIdForBook->volume);
        } else {
            echo 'Шкаф № ' . $this->getShelfId() . ' переполнен. Положите книгу в другой шкаф' . PHP_EOL;
        }
    }
}
