<?php
use PHPUnit\Framework\TestCase;

class StackTest3 extends TestCase
{
    public function testEmpty()
    {
       // $li = [];
		$re2 =  [];
		//$re2['reorder_quantity']
        $this->assertEmpty($re2);

      //  return $li;
        return $re2;
		
    }

    /**
     * @depends testEmpty
     */
    public function testPush(array $re2)
    {
        array_push($re2,'reorder_quantity');
        $this->assertSame('reorder_quantity', $re2[count($re2)-1]);
        $this->assertNotEmpty($re2);

        return $re2;
    }

    /**
     * @depends testPush
     */
    public function testPop(array $re2)
    {
        $this->assertSame('reorder_quantity', array_pop($re2));
        $this->assertEmpty($re2);
    }
}


