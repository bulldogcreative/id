<?php

namespace Bulldog;

class Identifier
{
    private $prefix;

    public function __construct(string $prefix = '')
    {
        $this->prefix = $prefix;
    }

    public function object($length = 8)
    {
        return $this->prefix . $this->bucket(floor($length / 2)) . $this->random(ceil($length / 2));
    }

    public static function simple($hashlen = 8)
    {
        return uniqid().substr(hash('md5', uniqid()), 0, $hashlen);
    }

    public function random($length = 8)
    {
        return substr($this->encode(random_bytes($length)), 0, $length);
    }

    public function bucket($length = 8)
    {
        $seconds = time() - mktime(0, 0, 0, 1, 1, date('Y'));
        $secondsEncoded = $this->encode($seconds);

        return substr($secondsEncoded, 0, $length);
    }

    protected function encode($input)
    {
        return rtrim(strtr(base64_encode($input), '+/', '-_'), '=');
    }
}
