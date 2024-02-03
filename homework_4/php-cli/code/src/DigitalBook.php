<?php

require_once "Book.php";

class DigitalBook extends Book
{
    private string $url;
    private int $countDownload = 0; // Переменная для подсчета количества скачиваний

    public function __construct(string $name, array $authors, string $genre, int $issueYear, string $url)
    {
        parent::__construct($name, $authors, $genre, $issueYear);
        $this->url = $url;
    }

    // Метод скачивания книги
    public function takeBook(string $name): string
    {
        return 'Книга ' . $this->getName() . ', автор: ' . $this->getAuthor() . ', жанр: ' . $this->getGenre() . ', год: ' . $this->getIssueYear() . ', (' . $this->url . '), скачана пользователем ' . $name . ' Количество скачиваний книги: ' . ++$this->countDownload;
    }
}
