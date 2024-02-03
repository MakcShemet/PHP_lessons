<?php

require_once 'DigitalBook.php';
require_once 'PaperBook.php';
require_once 'Shelf.php';

$pBook1 = new PaperBook('Лабиринт отражений', ['Лукьяненко С.В.'], 'Фантастика', 1996, 1);
$pBook2 = new PaperBook('Измененные', ['Лукьяненко С.В.'], 'Фантастика', 2022, 1);
$pBook3 = new PaperBook('Измененные 2', ['Лукьяненко С.В.'], 'Фантастика', 2022, 1);
$dBook1 = new DigitalBook('Золотой телёнок', ['И.Ильф', 'Е.Петров'], 'Сатира', 1931, 'http://www.digital-book.com/gold-taurus.pdf');
$dBook2 = new DigitalBook('Дюна', ['Фрэнк Герберт'], 'Фантастика', 1965, 'http://www.digital-book.com/dune.mp3');

$bShelf = new Shelf(1, 2, 2, []);

$bShelf->placeBookInShelf($pBook1);
$bShelf->placeBookInShelf($pBook3);
echo $pBook2->takeBook('Иванов И.И.') . PHP_EOL;
echo 'Количество книг в шкафу №' . $bShelf->getShelfId() . ': ' . $bShelf->getCountBooks() . PHP_EOL;


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
// $a1->foo();      // 1
// $a2->foo();      // 2
// $a1->foo();      // 3
// $a2->foo();      // 4

// Что он выведет на каждом шаге? Почему?  
// Статическая переменная, объявленная в публичном методе foo() класса A, изменяется при изменении 
//в любом из созданных объектов класса. Каждый последующий вызов функции foo() увеличивает переменнyю $x  на единицу каким бы объектом
// класса А не вызывалась. А т.к. инкремент префиксный, то переменная $x сначала увеличивается на единицу, а затем выводится на 
//экран. При постфискном инкременте результат вывода был бы такой: 0123

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
// $a1->foo();      //1
// $b1->foo();      //2
// $a1->foo();      //3
// $b1->foo();      //4     // Класс B наследует от класса А его метод foo(), но не переопределяет его, потому результат будет тот же
