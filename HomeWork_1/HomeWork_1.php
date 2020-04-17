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