<?php

namespace delphi\ORM\Client\Laudis;

use delphi\ORM\Client\ResultInterface;
use Ds\Map;
use Ds\Vector;

class ResultProxy implements ResultInterface {
    private Vector $result;

    public function __construct(Vector $result)
    {
        $this->result = $result;
    }

    public function records(): array
    {
        return array_map(fn(Map $i) => $i, iterator_to_array($this->result->getIterator()));
    }
}
