<?php


namespace App\Factory;


class ProductFactory
{
    public static function create($request)
    {
        return new Product($request);
    }
}