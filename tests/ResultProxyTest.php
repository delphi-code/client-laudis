<?php

namespace delphi\Tests\ORM\Client\Laudis;

use delphi\ORM\Client\Laudis\ResultProxy;
use Ds\Map;
use Ds\Vector;
use PHPUnit\Framework\TestCase;

/**
 * @coversDefaultClass \delphi\ORM\Client\Laudis\ResultProxy
 */
class ResultProxyTest extends TestCase {
    /**
     * @covers ::records
     * @covers ::__construct
     */
    public function testRecords()
    {
        $map1   = new Map(['value', 'valyou']);
        $map2   = new Map(['valyoo', 'val']);
        $result = new Vector([$map1, $map2]);
        $sut    = new ResultProxy($result);
        $this->assertEquals([
            $map1,
            $map2,
        ], $sut->records());
    }
}
