<?php

namespace AlaaTV\Gateways;

use AlaaTV\Gateways\Contracts\OnlineGateway;

class PaymentDriver
{
    private static $map = [];

    private static $gates = [];

    public static function select($driver)
    {
        app()->bind(OnlineGateway::class, self::$map[$driver]);
        config()->set('constants.PAYMENT_METHOD_ONLINE', self::$gates[$driver]);
    }

    public static function addDriver($key, $value, $id)
    {
        self::$map[$key] = $value;
        self::$gates[$key] = $id;
    }
}