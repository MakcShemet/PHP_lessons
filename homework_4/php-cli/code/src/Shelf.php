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

    public function lookBooksInShelf(): void
    {
        if (count($this->books) !== 0) {
            foreach ($this->books as $book) {
                echo $book->getName() . PHP_EOL;
            }
        } else {
            echo 'В шкафу №' . $this->getShelfId() . ' нет книг';
        }
    }

    public function getCountBooks()
    {
        return count($this->books);
    }

    public function addBook(PaperBook $book)
    {
        $shelfIdForBook = $book->getShelfId();
        if ($this->getShelfId() === $shelfIdForBook && count($this->books) < $this->getVolume()) {
            $this->books[] = $book;
        } else {
            echo 'Шкаф № ' . $this->getShelfId() . ' переполнен. Положите книгу "' . $book->getName() . '" в другой шкаф' . PHP_EOL;
        }
    }
}
