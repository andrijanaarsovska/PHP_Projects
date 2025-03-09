<?php

use function Sodium\add;

enum CoffeeType: string
{
    case ESPRESSO = 'Espresso';
    case LATTE = 'Latte';
    case AMERICANO = 'Americano';
}

enum TeaType: string
{
    case BLACK = 'Black';
    case GREEN = 'Green';
}

abstract class Beverage
{
    public string $name;
    public float $price;

    public function __construct(string $name, string $price)
    {
        $this->name = $name;
        $this->price = $price;
    }

    abstract public function calculateTotalPrice(int $quantity);

    //return $this->price * $quantity;

}


trait Discountable
{
    public function applyDiscount(float $amount)
    {
        $this->price = $this->price - $amount;
    }
}

class Tea extends Beverage{
    use Discountable;

    protected TeaType $type;
    public function __construct(string $name, string $price,TeaType $type)
    {
        parent::__construct($name, $price);
        $this->type = $type;
    }

    public function calculateTotalPrice(int $quantity): float|int
    {
        return $this->price * $quantity;
    }
}

class Coffee extends Beverage
{
    use Discountable;

    protected CoffeeType $type;

    public function __construct(string $name, string $price, CoffeeType $typeCoffee)
    {
        parent::__construct($name, $price);
        $this->type = $typeCoffee;

    }

    public function calculateTotalPrice(int $quantity): float|int
    {
        return $this->price * $quantity;
    }
}

class Order
{
    public array|Beverage $orders = [];


    public function addItem(Beverage $beverage, int $quantity)
    {
        $this->orders[] = ["beverage" => $beverage, "quantity" => $quantity];
    }


    public function CalculateOrderTotal()
    {
        $totalPrice = 0;
        foreach ($this->orders as $order) {
           $totalPrice += $order["beverage"]->calculateTotalPrice($order["quantity"]);
        }
        return $totalPrice;


    }
}

$coffee = new Coffee("Espresso", 140.0, CoffeeType::ESPRESSO);

$tea = new Tea("Green Tea", 100.0, TeaType::GREEN);

$coffee->applyDiscount(20.0);  // Apply a discount

$order = new Order();

$order->addItem($coffee, 2);  // 2 espresso

$order->addItem($tea, 1);     // 1 green tea

echo "Total order amount: " . $order->calculateOrderTotal() . " MKD";