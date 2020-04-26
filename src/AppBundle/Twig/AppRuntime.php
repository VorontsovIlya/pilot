<?php

namespace AppBundle\Twig;

class AppRuntime
{
    public function __construct()
    {
        // this simple example doesn't define any dependency, but in your own
        // extensions, you'll need to inject services using this constructor
    }

    public function priceFilter($number, $decimals = 0, $decPoint = '.', $thousandsSep = ',')
    {
        $price = number_format($number, $decimals, $decPoint, $thousandsSep);
        $price = '$'.$price;

        return $price;
    }

    public function splitLines($text)
    {
      return preg_split('/\r\n|\r|\n/', $text);
    }

    public function checkDomain($text){
        if ($text[0] == '/') return true;
        else return false;
    }
}