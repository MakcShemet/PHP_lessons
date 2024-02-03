<?php

require_once "Book.php";

class PaperBook extends Book
{
    private int $shelfId;
    private int $countRead = 0;

    public function __construct(string $name, array $authors, string $genre, int $issueYear, int $shelfId)
    {
        parent::__construct($name, $authors, $genre, $issueYear);
        $this->shelfId = $shelfId;
    }

    public function getShelfId()
    {
        return $this->shelfId;
    }

    public function setShelfId(int $shelfId)
    {
        $this->shelfId = $shelfId;
    }

    public function takeBook(string $name): string
    {

        return 'Книга: ' . $this->getName() . ', автор: ' . $this->getAuthor() . ', жанр: ' . $this->getGenre() . ', год: ' . $this->getIssueYear() . ',  шкаф №' . $this->getShelfId() . ', получена пользователем ' . $name . '. Количество прочтений: ' . ++$this->countRead;
    }

    public function returnBook(string $name): string
    {
        return 'Книга: ' . $this->getName() . ', автор: ' . $this->getAuthor() . ', жанр: ' . $this->getGenre() . ', год: ' . $this->getIssueYear() . ',  шкаф №' . $this->getShelfId() . ', возвращена пользователем ' . $name;
    }
}
