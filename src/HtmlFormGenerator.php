<?php

namespace AlaaTV\Gateways;

use AlaaTV\Gateways\Contracts\OnlineGateway;

class HtmlFormGenerator
{
    public static function generate($authorityCode, $seconds= 4)
    {
        $milli = (string) ($seconds * 1000);

        $redirectData = resolve(OnlineGateway::class)->generatePaymentPageUriObject($authorityCode);
        $output = "<form id='__alaa_gateway_form__' method='{$redirectData->getMethod()}' action='{$redirectData->getRedirectUrl()}'>";

        foreach ($redirectData->getInput() as $input) {
            $output .= "<input type='hidden' name='".$input['name']."' value='".$input['value']."'>";
        }

        $output .= "</form><script type='text/javascript'>
            function ready(callback) {
                // in case the document is already rendered
                if (document.readyState != 'loading') callback();
                // modern browsers
                else if (document.addEventListener) document.addEventListener('DOMContentLoaded', callback);
                // IE <= 8
                else document.attachEvent('onreadystatechange', function () {
                    if (document.readyState == 'complete') callback();
                });
            }

            ready(function () {
                setTimeout(function () {
                    document.getElementById('__alaa_gateway_form__').submit();
                },".$milli.");
            });
        </script>";

        return $output;
    }
}
