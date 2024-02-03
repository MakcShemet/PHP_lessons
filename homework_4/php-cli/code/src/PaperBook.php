<?php

require_once "Book.php";

class PaperBook extends Book
{
    private int $shelfId;
    private int $countRead = 0;  // Переменная для подсчета количества прочтений

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

    // Метод выдачи книги на руки
    public function takeBook(string $name): string
    {

        return 'Книга: ' . $this->getName() . ', автор: ' . $this->getAuthor() . ', жанр: ' . $this->getGenre() . ', год: ' . $this->getIssueYear() . ', получена пользователем ' . $name . ' Количество прочтений: ' . ++$this->countRead;
    }

    // Метод возврата книги читателем
    public function returnBook(string $name): string
    {
        return 'Книга: ' . $this->getName() . ', автор: ' . $this->getAuthor() . ', жанр: ' . $this->getGenre() . ', год: ' . $this->getIssueYear() . ',  шкаф №' . $this->getShelfId() . ', возвращена пользователем ' . $name;
    }
}
