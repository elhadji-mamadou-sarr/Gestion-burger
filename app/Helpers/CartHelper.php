<?php
use Illuminate\Support\Facades\Session;

if (!function_exists('cartCount')) {
    function cartCount()
    {
        return array_sum(Session::get('cart', []));
    }
}