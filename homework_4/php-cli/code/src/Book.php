<?php

abstract class  Book
{
    private string $name;
    private array $authors;
    private string $genre;
    private int $issueYear;

    public function __construct(string $name, array $authors, string $genre, int $issueYear)
    {
        $this->name = $name;
        $this->authors = $authors;
        $this->genre = $genre;
        $this->issueYear = $issueYear;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getAuthor(): string
    {
        $arrAuthors = '';
        foreach ($this->authors as $author) {
            $arrAuthors .= $author . ' ';
        }
        return $arrAuthors;
    }

    public function getAuthors(): array
    {
        return $this->authors;
    }

    public function getGenre(): string
    {
        return $this->genre;
    }

    public function getIssueYear(): int
    {
        return $this->issueYear;
    }

    abstract public function takeBook(string $name): string;
}
