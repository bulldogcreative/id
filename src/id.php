<?php

namespace Bulldog\ObjectId
{
    function id($length)
    {
        $parts = [];
        
        // By using floor and ceil, if we divide an odd number by 2
        // we only get whole numbers that add up to the length.
        $parts[0] = bucket(floor($length / 2));
        $parts[1] = random(ceil($length / 2));

        $id = $parts[0].$parts[1];

        return $id;
    }

    function bucket($length)
    {
        $seconds = time() - mktime(0, 0, 0, 1, 1, date('Y'));
        $secondsEncoded = encode($seconds);

        return substr($secondsEncoded, 0, $length);
    }

    function random($length)
    {
        return substr(encode(random_bytes($length)), 0, $length);
    }

    function encode($input)
    {
        return rtrim(strtr(base64_encode($input), '+/', '-_'), '=');
    }
}
