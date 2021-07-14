<?php
namespace Ayeo\Barcode\Test;

use Ayeo\Barcode\Barcode\Gs1_128;
use Ayeo\Barcode\Builder;

//test data generated using: http://example.barcodephp.com/html/BCGgs1128.php
class Gs1_128Test extends \PHPUnit_Framework_TestCase
{
    /**
     * @return Gs1_128
     */
    private function getBuilder()
    {
        return new Gs1_128();
    }

    /**
     * @dataProvider realDataProvider
     */
    public function testReal($value, $expected)
    {
        $this->assertEquals($expected, $this->getBuilder()->generate($value));
    }

    public function realDataProvider()
    {
        return [
            [
                '(12)111111',
                '110100111001111010111010110011100110001001001100010010011000100100111010110001100011101011'
            ],
            [
                '(00)159052793120000019',
                '110100111001111010111011011001100101110011001101111011011011100010100011110101101100011011001001110110110011001101100110011001011100110000101001100011101011'
            ],
            [
                '(10)012345',
                '110100111001111010111011001000100110011011001110110111010111011000110001101101100011101011'
            ],
            [
                '(10)12345',
                '11010011100111101011101100100010010110011100100010110001110101111011011100100110110011001100011101011'
            ],
            [
                '(400)1500',
                '11010011100111101011101100010100011001101100110001011101110101111010011101100110010000101100011101011'
            ],
            [
                '(400)albert',
                '1101001110011110101110110001010001011110111010011101100100101100001100101000010010000110101100100001001001111010011110100100110001001100011101011'
            ],

            //joined codes
            [
                '(10)123456(400)11',
                '1101001110011110101110110010001001011001110010001011000111000101101111010111011000101000110011011001110101111010011100110101111001001100011101011'

            ]
        ];
    }

    public function testX()
    {
        $builder = new Builder();
        $builder->setBarcodeType('gs1-128');
        $builder->setFilename('/opt/project/barcode.png');
        $builder->setImageFormat('png');
        $builder->setWidth(550);
        $builder->setHeight(400);
        $builder->setFontSize(15);
        $builder->setBackgroundColor(255, 255, 255);
        $builder->setPaintColor(0, 0, 0);

        $string = '(403)22';
        $online   = '1101001110011110101110110000101000011000011011010111101110110011100101101000011110110000111101011';
        $result = $this->getBuilder()->generate($string);
        $this->assertEquals($online, $result);
    }

}