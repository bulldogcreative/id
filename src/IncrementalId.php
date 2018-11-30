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

    public function create(...$ids)
    {
        $this->id = '';
        foreach($ids as $i) {
            $this->id .= $this->encode($i);
        }
        return $this->id;
    }

    public function get($length)
    {
        return $this->prefix . substr($this->id, 0, $length);
    }

    public function setPrefix(string $prefix)
    {
        $this->prefix = $prefix;
    }
}
