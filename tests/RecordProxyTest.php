<?php

namespace delphi\Tests\ORM\Client\Laudis;

use delphi\ORM\Client\Laudis\RecordProxy;
use Ds\Map;
use PHPUnit\Framework\TestCase;

/**
 * @coversDefaultClass \delphi\ORM\Client\Laudis\RecordProxy
 */
class RecordProxyTest extends TestCase {
    /**
     * @covers ::get
     * @covers ::__construct
     */
    public function testGet()
    {
        $record = new Map(['value' => 'you', 'valyoo' => 'yoo']);
        $sut    = new RecordProxy($record);
        $this->assertEquals('you', $sut->get('value'));
        $this->assertEquals('yoo', $sut->get('valyoo'));
    }

    /**
     * @covers ::get
     * @covers ::__construct
     */
    public function testGetWithDefault()
    {
        $record  = new Map([]);
        $sut     = new RecordProxy($record);
        $default = __METHOD__;
        $this->assertEquals($default, $sut->get('arbitrary', $default));
    }

    /**
     * @covers ::get
     * @covers ::__construct
     */
    public function testGetWithDefaultNotProvided()
    {
        $record  = new Map([]);
        $sut     = new RecordProxy($record);
        $default = null;
        $this->assertEquals($default, $sut->get('arbitrary'));
    }
}
