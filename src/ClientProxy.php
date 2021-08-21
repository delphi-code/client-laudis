<?php

namespace delphi\ORM\Client\Laudis;

use delphi\ORM\Client\ClientInterface;
use delphi\ORM\Client\ResultInterface;
use Laudis\Neo4j\Contracts\ClientInterface as LaudisClientInterface;

class ClientProxy implements ClientInterface {
    public function __construct(LaudisClientInterface $client)
    {
        $this->client = $client;
    }

    public function run($query, $parameters = null, $tag = null, $connectionAlias = null): ResultInterface
    {
        return new ResultProxy(
            $this->client->run(
                $query,
                is_null($parameters) ? [] : $parameters,
                $connectionAlias
            )
        );
    }

}
