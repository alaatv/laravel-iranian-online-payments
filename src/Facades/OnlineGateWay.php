<?php

namespace AlaaTV\Gateways\Facades;

use Illuminate\Support\Facades\Facade;
use AlaaTV\Gateways\Contracts\OnlineGateway as OnlineGatewayContract;

/**
 * Class OnlineGateWay
 *
 * @method static getAuthorityValue();
 * @method static verifyPayment($amount, $authority);
 * @method static generateAuthorityCode(string $callbackUrl, int $cost, string $description, $orderId);
 * @method static OnlinePaymentRedirectionUriInterface generatePaymentPageUriObject($refId)
 */
class OnlineGateWay extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return OnlineGatewayContract::class;
    }
}