<?php
/**
 * Description of WayForPaySignatureGenerator.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Dots\WayForPay\App\Client\Auth;

class WayForPaySignatureGenerator
{
    public static function generateSignature(string $secretKey, array $fields): string
    {
        $signString = implode(';', $fields);

        return hash_hmac('md5', $signString, $secretKey);
    }

    public static function generateChargeSignature(
        string $secretKey,
        string $merchantAccount,
        string $merchantDomainName,
        string $orderReference,
        int $orderDate,
        float $amount,
        string $currency,
        array $productNames,
        array $productCounts,
        array $productPrices,
    ): string {
        $fields = array_merge(
            [
                $merchantAccount,
                $merchantDomainName,
                $orderReference,
                $orderDate,
                $amount,
                $currency,
            ],
            $productNames,
            $productCounts,
            $productPrices,
        );

        return self::generateSignature($secretKey, $fields);
    }

    public static function generateRefundSignature(
        string $secretKey,
        string $merchantAccount,
        string $orderReference,
        float $amount,
        string $currency,
    ): string {
        return self::generateSignature($secretKey, [
            $merchantAccount,
            $orderReference,
            $amount,
            $currency,
        ]);
    }

    public static function generateSettleSignature(
        string $secretKey,
        string $merchantAccount,
        string $orderReference,
        float $amount,
        string $currency,
    ): string {
        return self::generateSignature($secretKey, [
            $merchantAccount,
            $orderReference,
            $amount,
            $currency,
        ]);
    }

    public static function generateCheckStatusSignature(
        string $secretKey,
        string $merchantAccount,
        string $orderReference,
    ): string {
        return self::generateSignature($secretKey, [
            $merchantAccount,
            $orderReference,
        ]);
    }

    public static function generateWebhookResponseSignature(
        string $secretKey,
        string $orderReference,
        string $status,
        int $time,
    ): string {
        return self::generateSignature($secretKey, [
            $orderReference,
            $status,
            $time,
        ]);
    }

    public static function generateResponseSignature(
        string $secretKey,
        string $merchantAccount,
        string $orderReference,
        float $amount,
        string $currency,
        string $authCode,
        string $cardPan,
        string $transactionStatus,
        string $reasonCode,
    ): string {
        return self::generateSignature($secretKey, [
            $merchantAccount,
            $orderReference,
            $amount,
            $currency,
            $authCode,
            $cardPan,
            $transactionStatus,
            $reasonCode,
        ]);
    }
}
