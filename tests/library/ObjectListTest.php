<?php

require_once dirname(__SELF__) . '/../library/ObjectList.php';

class A
{
}

class ObjectListTest extends PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->aList = new ObjectList('A');
    }
    
    public function testCanSetInstanceOfGivenClass()
    {
        $obj1 = new A;
        $obj2 = new A;
        $obj3 = new A;
        $this->aList->push($obj1);
        $this->aList->unshift($obj2);
        $this->aList->offsetSet(0, $obj3);
        $this->assertTrue(true);
    }
    
    public function testSetCannotSetInstanceOfNotGivenClass()
    {
        $obj = new stdClass;
        $this->setExpectedException('OutOfBoundsException');
        $this->aList->offsetSet(0, $obj);
    }
    
    public function testCannotPushInstanceOfNotGivenClass()
    {
        $obj = new stdClass;
        $this->setExpectedException('OutOfBoundsException');
        $this->aList->push($obj);
    }
    
    public function testCannotUnshiftInstanceOfNotGivenClass()
    {
        $obj = new stdClass;
        $this->setExpectedException('OutOfBoundsException');
        $this->aList->unshift($obj);
    }
}