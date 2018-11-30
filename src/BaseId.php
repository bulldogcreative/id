<?php

namespace Bulldog\id;

class BaseId
{
    protected function encode($input)
    {
        return rtrim(strtr(base64_encode($input), '+/', '-_'), '=');
    }
}
