<?php


namespace App\Factory;


class Product
{
    private $name;
    private $price;
    private $category;

    public function __construct($request)
    {
        $this->name = $request['name'];
        $this->price = $request['price'];
        $this->category = $request['category'];
    }

    public function name()
    {
        return $this->name;
    }
    public function price()
    {
        return $this->price;
    }
    public function category()
    {
        return $this->category;
    }
}
