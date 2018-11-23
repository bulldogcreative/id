<?php

namespace Bulldog\id\Contracts
{
    interface ObjectIdInterface extends \Bulldog\id\Contracts\IdInterface
    {
        public function setPrefix(string $prefix);
    }
}
