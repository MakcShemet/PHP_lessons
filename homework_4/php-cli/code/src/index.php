<?php

require_once 'DigitalBook.php';
require_once 'PaperBook.php';
require_once 'Shelf.php';

$pBook1 = new PaperBook('Лабиринт отражений', ['Лукьяненко С.В.'], 'Фантастика', 1996, 1);
$pBook2 = new PaperBook('Измененные', ['Лукьяненко С.В.'], 'Фантастика', 2022, 1);
$dBook1 = new DigitalBook('Золотой телёнок', ['И.Ильф, Е.Петров'], 'Сатира', 1931, 'http://www.digital-book.com/gold-taurus.pdf');

$bShelf = new Shelf(1, 2, 2);

// echo $pBook1->getShelfId() . PHP_EOL;
echo $pBook2->takeBook('Измененные') . PHP_EOL;
echo $dBook1->getAuthor() . PHP_EOL;
$bShelf->addBook($pBook1);
echo $bShelf->getVolume();



// 6. Дан код:

// class A
// {
//     public function foo()
//     {
//         static $x = 0;
//         echo ++$x;
//     }
// }
// $a1 = new A();
// $a2 = new A();
// $a1->foo();
// $a2->foo();
// $a1->foo();
// $a2->foo();

// Что он выведет на каждом шаге? Почему?

// Немного изменим п.5
// Что он выведет теперь?

// class A
// {
//     public function foo()
//     {
//         static $x = 0;
//         echo ++$x;
//     }
// }
// class B extends A
// {
// }
// $a1 = new A();
// $b1 = new B();
// $a1->foo();
// $b1->foo();
// $a1->foo();
// $b1->foo();
