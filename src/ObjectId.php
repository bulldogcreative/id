<?php

namespace Bulldog\id;

use Bulldog\id\Contracts\ObjectIdInterface;

class ObjectId extends BaseId implements ObjectIdInterface
{
    protected $prefix;

    public function __construct(string $prefix = '')
    {
        $this->prefix = $prefix;
    }

    public function get($length)
    {
        $parts = [];

        // By using floor and ceil, if we divide an odd number by 2
        // we only get whole numbers that add up to the length.
        $parts[0] = $this->bucket(floor($length / 2));
        $parts[1] = $this->random(ceil($length / 2));

        $id = $parts[0].$parts[1];

        return $this->prefix . $id;
    }

    public function setPrefix(string $prefix)
    {
        $this->prefix = $prefix;
    }

    protected function bucket($length)
    {
        $seconds = time() - mktime(0, 0, 0, 1, 1, date('Y'));
        $secondsEncoded = $this->encode($seconds);

        return substr($secondsEncoded, 0, $length);
    }

    protected function random($length)
    {
        return substr($this->encode(random_bytes($length)), 0, $length);
    }
}
