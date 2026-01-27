<?php

namespace App\Services\V1\Payment;

use App\Enums\PaymentMethod;
use App\Interfaces\PaymentGatewayInterface;
use App\Services\V1\Payment\Gateways\PayPalGateway;
use App\Services\V1\Payment\Gateways\CreditCardGateway;

class PaymentGatewayFactory
{
    public static function make(PaymentMethod $method): PaymentGatewayInterface
    {
        return match ($method) {
            PaymentMethod::CREDIT_CARD => new CreditCardGateway(),
            PaymentMethod::PAYPAL => new PayPalGateway(),
            default => throw new \Exception('Unsupported payment method'),
        };
    }
}

