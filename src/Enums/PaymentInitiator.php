<?php

namespace Chargebee\Enums;

enum PaymentInitiator : string { 
    case CUSTOMER = "customer";
    case MERCHANT = "merchant";
    case UNKNOWN = "unknown";

    public static function tryFromValue(string $value): self {
        return self::tryFrom($value) ?? self::UNKNOWN;
    }
}
?>