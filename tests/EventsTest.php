<?php
use PHPUnit\Framework\TestCase;
use PHPUnit\DbUnit\TestCaseTrait;
require "./src/getEvents.php";

class MesTest extends TestCase{

	 function testGetEvents(){
		 //test output, you would need to use the expectOutputString() or expectOutputRegex() methods in your test.
		 //To test for non-empty output, I believe the following should do
		 $this->expectOutputRegex('/./');
		 $events = new Events;
		$json =  $events->getEvents();
	}

}


?>
