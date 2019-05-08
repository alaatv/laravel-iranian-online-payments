<?php

namespace AlaaTV\Gateways;

use AlaaTV\Gateways\Contracts\OnlineGateway;

class PaymentDriver
{
    private static $map = [];

    private static $gates = [];

    public static function select($driver)
    {
        $driverClass = self::$map[$driver] ?? null;

        if(is_null($driverClass)) {
            throw new \InvalidArgumentException("$driver driver not found");
        }

        app()->bind(OnlineGateway::class, $driverClass);
        config()->set('constants.PAYMENT_METHOD_ONLINE', self::$gates[$driver]);
        return resolve(OnlineGateway::class);
    }

    public static function addDriver($key, $value, $id)
    {
        self::$map[$key] = $value;
        self::$gates[$key] = $id;
    }
}