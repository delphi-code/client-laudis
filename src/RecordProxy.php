<?php

namespace delphi\ORM\Client\Laudis;

use delphi\ORM\Client\RecordInterface;
use Ds\Map;

class RecordProxy implements RecordInterface {
    private Map $record;

    public function __construct(Map $record)
    {
        $this->record = $record;
    }

    public function get(string $key, $defaultValue = null)
    {
        return $this->record->get($key, $defaultValue);
    }

}
