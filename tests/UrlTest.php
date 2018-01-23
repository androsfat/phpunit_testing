<?php
use app\Url;
use PHPUnit\Framework\TestCase;

class UrlTest extends TestCase
{

    /**
     * @param string $originalString String to be sluggified
     * @param string $expectedResult What we expect our slug result to be
     *
     * @dataProvider providerTestSluggifyReturnsSluggifiedString
     */
    public function testSluggifyReturnsSluggifiedString($originalString, $expectedResult)
    {
        $url = new Url();

        $result = $url->sluggify($originalString);

        $this->assertEquals($expectedResult, $result);
    }

    public function providerTestSluggifyReturnsSluggifiedString()
    {
        return array(
            array('This string will be slaggified', 'this-string-will-be-slaggified'),
            array('THIS STRING WILL BE SLAGGIFIED', 'this-string-will-be-slaggified'),
            array('This string2 will3 be 44 slaggified10', 'this-string2-will3-be-44-slaggified10'),
            array('This! @string#$ %$will3 ()be "slaggified', 'this-string-will3-be-slaggified'),
            array("This tänk – förr'n vi föser string will be slaggified",
                'this-tank-forrn-vi-foser-string-will-be-slaggified'),
            array('', ''),
        );
    }
}