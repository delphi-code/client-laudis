<?php

namespace delphi\Tests\ORM\Client\Laudis;

use delphi\ORM\Client\Laudis\ClientProxy;
use delphi\ORM\Client\Laudis\ResultProxy;
use Ds\Map;
use Ds\Vector;
use Laudis\Neo4j\Contracts\ClientInterface;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use PHPUnit\Framework\TestCase;

/**
 * @coversDefaultClass \delphi\ORM\Client\Laudis\ClientProxy
 * @uses \delphi\ORM\Client\Laudis\ResultProxy
 */
class ClientProxyTest extends TestCase {
    use MockeryPHPUnitIntegration;

    protected ClientProxy $sut;

    protected \Mockery\Mock|ClientInterface $client;

    public function setUp(): void
    {
        /** @var \Mockery\Mock|ClientInterface $client */
        $client       = \Mockery::mock(ClientInterface::class);
        $this->client = $client;

        $this->sut = new ClientProxy($client);
    }

    /**
     * @covers ::run
     * @covers ::__construct
     */
    public function testRun()
    {
        $query           = 'query string';
        $parameters      = ['param' => 'eter'];
        $tag             = 'tag';
        $connectionAlias = 'alias';

        $map    = new Map([
            'val' => 'yoo',
        ]);
        $vector = new Vector(
            [
                $map,
            ]
        );
        $this->client->shouldReceive('run')->with($query, $parameters, $connectionAlias)->andReturn($vector)->once();

        $out = $this->sut->run($query, $parameters, $tag, $connectionAlias);

        $this->assertInstanceOf(ResultProxy::class, $out);
        $this->assertEquals([$map], $out->records());
    }
}
