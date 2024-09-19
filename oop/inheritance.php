<?php

class OrderDetails
{
    public $product;
    public $qty;
    public $price;
    public $total;

    function __construct($product, $qty, $price, $total)
    {
        $this->product = $product;
        $this->qty = $qty;
        $this->price = $price;
        $this->total = $total;
    }

    public function showDetails()
    {
        return "Order Details <br>
                Product: $this->product <br>
                Quantity: $this->qty  <br>
                Price: $this->price <br>
                Total Price: $this->total 
        ";
    }
}

class voucher extends OrderDetails
{
    public function showDetails()
    {
        $discount = 500;

        $newPrice = $this->total - $discount;

        return "Order Details <br>
                Product: $this->product <br>
                Quantity: $this->qty  <br>
                Price: $this->price <br>
                Voucher Discount: $discount <br>
                Total Price: $newPrice 
        ";
    }
}

// $order = new OrderDetails('laptop', 10, 200, 10000);
// echo $order->showDetails();

// echo '<br>';
// echo '<br>';

// $newOrder = new OrderDetails('Mobile', 5, 100, 5000);
// echo $newOrder->showDetails();

// echo '<br>';
// echo '<br>';

$newOrder2 = new OrderDetails('Mouse', 5, 103, 34000);
echo $newOrder2->showDetails();

echo '<br>';
echo '<br>';

$voucher = new voucher('laptop', 10, 2000, 10000);
echo $voucher->showDetails();
