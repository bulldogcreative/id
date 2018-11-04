<?php

use PHPUnit\Framework\TestCase;
use function Bulldog\ObjectId\id;

class IdTests extends TestCase
{
    public function testUniquenessSeven()
    {
        $ids = [];
        $len = 7;

        for($i=0; $i<1000; $i++) {
            $ids[] = id($len);
            $this->assertEquals(strlen($ids[$i]), $len);
        }

        for($i=0; $i<1000; $i++) {
            $result = in_array(id($len), $ids);
            $this->assertFalse($result);
        }
    }

    public function testUniquenessTwenty()
    {
        $ids = [];
        $len = 20;

        for($i=0; $i<1000; $i++) {
            $ids[] = id($len);
            $this->assertEquals(strlen($ids[$i]), $len);
        }

        for($i=0; $i<1000; $i++) {
            $result = in_array(id($len), $ids);
            $this->assertFalse($result);
        }
    }
}