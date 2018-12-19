<?php

namespace Bulldog\id;

class SimpleId
{
    public static function get()
    {
        return uniqid().substr(hash('md5', uniqid()), 0, 13);
    }
}
