<?php

use PHPUnit\Framework\TestCase;

class IdTests extends TestCase
{
    public function testUniquenessSeven()
    {
        $ids = [];
        $id = new \Bulldog\id\ObjectId;
        $len = 7;

        for($i=0; $i<1000; $i++) {
            $ids[] = $id->get($len);
            $this->assertEquals(strlen($ids[$i]), $len);
        }

        for($i=0; $i<1000; $i++) {
            $result = in_array($id->get($len), $ids);
            $this->assertFalse($result);
        }
    }

    public function testUniquenessTwenty()
    {
        $ids = [];
        $id = new \Bulldog\id\ObjectId;
        $len = 20;

        for($i=0; $i<1000; $i++) {
            $ids[] = $id->get($len);
            $this->assertEquals(strlen($ids[$i]), $len);
        }

        for($i=0; $i<1000; $i++) {
            $result = in_array($id->get($len), $ids);
            $this->assertFalse($result);
        }
    }
}