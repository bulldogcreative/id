<?php

namespace Bulldog\id;

use Bulldog\id\Contracts\ObjectIdInterface;

class IncrementalId extends BaseId implements ObjectIdInterface
{
    protected $prefix;
    protected $id;

    public function __construct(string $prefix = '')
    {
        $this->prefix = $prefix;
    }

    public function get(...$ids)
    {
        $id = '';
        foreach($ids as $i) {
            $id .= $this->encode($i);
        }
        return $id;
    }

    public function setPrefix(string $prefix)
    {
        $this->prefix = $prefix;
    }
}
