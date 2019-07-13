<?php
use PHPUnit\Framework\TestCase;


class StackTest extends TestCase
{
    public function testEmpty()
    {
        $li = [];
        $this->assertEmpty($li);
			return $li;
     
		
        array_push($li, 'dbcon');
        $this->assertSame('dbcon', $li[count($li)-1]);
        $this->assertNotEmpty($li);
			return $li;
    
		
		$this->assertSame('dbcon', array_pop($li));
        $this->assertEmpty($li);
		return $li;
		$this->expectOutputString('print');
		print 'We have con for minimum quality ';
		
	
		   
		   
    }
	
	
}