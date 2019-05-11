<?php

namespace AlaaTV\Gateways;

use AlaaTV\Gateways\Contracts\OnlineGateway;

class PaymentDriver
{
    private static $map = [];

    public static function select($driver)
    {
        $driverClass = self::$map[$driver] ?? null;

        if(is_null($driverClass)) {
            throw new \InvalidArgumentException("$driver driver not found");
        }

        app()->bind(OnlineGateway::class, $driverClass);

        return resolve(OnlineGateway::class);
    }

    public static function addDriver($key, $value)
    {
        self::$map[$key] = $value;
    }
}