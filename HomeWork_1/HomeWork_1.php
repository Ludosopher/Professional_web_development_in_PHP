<?php
                                             // 1-4 задания
class User
{
    protected $name;
    protected $login;
    protected $password;

    function __construct($name, $login, $password) {
        $this->name = $name;
        $this->login = $login;
        $this->password = $password;
    }

    function greeting () { // Функция, которая будет адаптирована в дочернем классе Customer
        echo "{$this->name}, вы успешно авторизовались. Ваш логин: {$this->login}; пароль: {$this->password}.";
    }

    function warningUnrelPass () {  // Функция, которая без изменений наследуется дочерним классом Customer
        echo "Ваш пароль не обновлялся слишком долго. Это небезопасно! Советуем его изменить и делать это нереже одного раза в год.";
    }
}

class Customer extends User
{
    public $countOrders;
    public $costOrders;

    function __construct($name, $login, $password, $countOrders, $costOrders) {
        $this->name = $name;
        $this->login = $login;
        $this->password = $password;
        $this->countOrders = $countOrders;
        $this->costOrders = $costOrders;
    }
        
    function greeting () { // Изменение родительской функции с учётом специфики текущего дочернего класса
        echo "{$this->name}, вы успешно авторизовались. Ваш логин: {$this->login}; пароль: {$this->password}. У вас имеется {$this->countOrders} заказa, на общую сумму {$this->costOrders} рублей.";
    }

}

$user = new User('Иван Петров', 'ivan', '123');
$user->greeting();
$user->warningUnrelPass();

echo '<br><br>';

$customer = new Customer('Джон Малкович', 'john', '456', 2, 1500);
$customer->greeting();
$customer->warningUnrelPass();

                                         //Задание №5
//class A {
//    public function foo() {
//        static $x = 0;
//        echo ++$x;
//    }
//}
//$a1 = new A();
//$a2 = new A();
//$a1->foo(); // 1
//$a2->foo(); // 2
//$a1->foo(); // 1
//$a2->foo(); // 2
//
//До проверки
//Здесь два возможных варианта как я вижу.
//1. Свойство $x не объявлено предварительно до функции, а объявляется как статическая уже в самой функции. Возможно это нельзя делать, и мы полу-чим ошибку.  
//2.Каждый новый экземпляр класса учитывает результаты предыдущего: если в экземпляре $a1 переменная $x увеличивается до 1, то во втором экземпляре $a2 уже до 2. Когда же повторно вызывается функция одного и того же эк-земпляра, результат не меняется. 
//После проверки
//Выяснилось, что результат: 1234. Значит можно свойство можно объявлять в методе и повторный вызов функции экземпляра тоже учитывает предыдущие вызовы.
//
//
                                                    //Задание 6
//class A {
//    public function foo() {
//        static $x = 0;
//        echo ++$x;
//    }
//}
//class B extends A {
//}
//$a1 = new A(); 
//$b1 = new B(); 
//$a1->foo();  // 1
//$b1->foo(); // 1
//$a1->foo();// 2
//$b1->foo();// 2
//
//До проверки
//Так как $a и $b  являются экземплярами разных классов, то они не будут учитывать результаты друг друга.  Ну а при повторном вызове метода, как предыдущем задании, предыдущий результат учитывается, т.е. увеличивается на 1.
//После проверки
//Гипотеза подтвердилась.
//
//
//
//
//
//
//
//
//
                                                 //Задание 7
//class A {
//    public function foo() {
//        static $x = 0;
//        echo ++$x;
//    }
//}
//class B extends A {
//}
//$a1 = new A;
//$b1 = new B;
//$a1->foo(); 
//$b1->foo(); 
//$a1->foo(); 
//$b1->foo(); 
//
//До проверки
//Здесь экземпляр создаётся без указания скобок после названия класса. Это можно делать если в конструктор не передаются параметры. Значит результат будет аналогичный тому, что в задании 6: 1122.
//
//После проверки
//Гипотеза подтвердилась
