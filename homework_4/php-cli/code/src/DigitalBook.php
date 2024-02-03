﻿<?php

require_once "Book.php";

class DigitalBook extends Book
{
    private string $url;
    private $book;
    public static int $countRead = 0;

    public function __construct(string $name, array $authors, string $genre, int $issueYear, string $url)
    {
        parent::__construct($name, $authors, $genre, $issueYear);
        $this->url = $url;
    }

    public function takeBook(string $name): string
    {
        return 'Книга ' . $this->getName() . 'автор: ' . $this->getAuthors() . 'жанр: ' . $this->getGenre() . 'год: ' . $this->getIssueYear() . '' . $this->url . ' скачана пользователем' . $name;
    }
}
