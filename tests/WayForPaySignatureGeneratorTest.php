<?php
/**
 * Description of WayForPaySignatureGeneratorTest.php
 * @copyright Copyright (c) DOTSPLATFORM, LLC
 * @author    Bogdan Mamontov <bohdan.mamontov@dotsplatform.com>
 */

namespace Tests;

use Dots\WayForPay\App\Client\Auth\WayForPaySignatureGenerator;
use PHPUnit\Framework\TestCase;

class WayForPaySignatureGeneratorTest extends TestCase
{
    public function testGenerateSignature(): void
    {
        $secretKey = 'flk3409refn54t54t*FNJRET';
        $fields = [
            'test_merch_n1',
            'www.market.ua',
            'DH1773070193',
            '1415379863',
            '1547.36',
            'UAH',
            'Процесор Intel Core i5-4670 3.4GHz',
            'Kingston DDR3-1600 4096MB PC3-12800',
            '1',
            '1',
            '1000',
            '547.36',
        ];

        $result = WayForPaySignatureGenerator::generateSignature($secretKey, $fields);

        $this->assertEquals('c20fd44fe3d6f4cf6f5642268130f51a', $result);
    }

    public function testGenerateChargeSignature(): void
    {
        $secretKey = 'flk3409refn54t54t*FNJRET';

        $result = WayForPaySignatureGenerator::generateChargeSignature(
            secretKey: $secretKey,
            merchantAccount: 'test_merch_n1',
            merchantDomainName: 'www.market.ua',
            orderReference: 'DH1773070193',
            orderDate: 1415379863,
            amount: 1547.36,
            currency: 'UAH',
            productNames: [
                'Процесор Intel Core i5-4670 3.4GHz',
                'Kingston DDR3-1600 4096MB PC3-12800',
            ],
            productCounts: [1, 1],
            productPrices: [1000, 547.36],
        );

        $this->assertEquals('c20fd44fe3d6f4cf6f5642268130f51a', $result);
    }

    public function testGenerateChargeSignatureWithSingleProduct(): void
    {
        $secretKey = 'flk3409refn54t54t*FNJRET';

        $result = WayForPaySignatureGenerator::generateChargeSignature(
            secretKey: $secretKey,
            merchantAccount: 'test_merch_n1',
            merchantDomainName: 'ma-release.dotsdev.live',
            orderReference: '019cd313-5b03-7183-a0a4-03cd10050f3c',
            orderDate: 1773067787,
            amount: 137.38,
            currency: 'UAH',
            productNames: ['Create Payment'],
            productCounts: [1],
            productPrices: [137.38],
        );

        $this->assertEquals('866e36834a210f54193035597c725ba6', $result);
    }
}
