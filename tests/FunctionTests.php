<?php
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Error\Error;

class StackTest extends TestCase
{
    public function testEmpty()
    {
        $li = [];
        $this->assertEmpty($li);

        return $li;
    }

    /**
     * @depends testEmpty
     */
    public function testPush(array $li)
    {
        array_push($li, 'dbcon');
        $this->assertSame('dbcon', $li[count($li)-1]);
        $this->assertNotEmpty($li);

        return $li;
    }

    /**
     * @depends testPush
     */
    public function testPop(array $li)
    {
        $this->assertSame('dbcon', array_pop($li));
        $this->assertEmpty($li);
    }
}

class StackTest2 extends TestCase
{
    public function testEmpty()
    {
       // $li = [];
		$min_qtty =  [];
	   $this->assertEmpty($min_qtty);
		return $min_qtty;
		
    }

    /**
     * @depends testEmpty
     */
    public function testPush(array $min_qtty)
    {
        array_push($min_qtty,'min_quantity');
        $this->assertSame('min_quantity', $min_qtty[count($min_qtty)-1]);
        $this->assertNotEmpty($min_qtty);

        return $min_qtty;
    }

    /**
     * @depends testPush
     */
    public function testPop(array $min_qtty)
    {
        $this->assertSame('min_quantity', array_pop($min_qtty));
        $this->assertEmpty($min_qtty);
    }
}


class StackTest3 extends TestCase
{
    public function testEmpty()
    {
		$re2 =  [];
        $this->assertEmpty($re2);
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
class MultipleDependenciesTest extends TestCase
{
    public function StackTest()
    {
        $this->assertTrue(true);
        return 'Connection okay';
    }

    public function StackTest2()
    {
        $this->assertTrue(true);
	    return 'minimun quatity';
    }
	public function testReorderQuan()
    {
        $this->assertTrue(true);
	    return 'Reorder quatity';
    }

   
    public function testMinquat($li, $min_qtty)
    {
        $this->assertSame('we have connected ', $li);
        $this->assertSame('for minimum quantity ', $min_qtty);
		$this->expectOutputString('print');
        print 'We have con for minimum quality ';
    }
	
	public function TestReorder ($li,$res)
	{
		$this->assertSame('we have connected ', $li);
		$this->assertSame('for reorder ', $re2);
		$this->expectOutputString('reorder value ');
        print 'We have reordered';
	}
}

class ExpectedErrorTest extends TestCase
{
    public function testFailingInclude()
    {
        $this->expectException(Error::class);

        include '../funcs.php';
    }
}


