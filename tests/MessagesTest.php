<?php
use PHPUnit\Framework\TestCase;
use PHPUnit\DbUnit\TestCaseTrait;

require "./src/getMessages.php";

class MessagesTest extends TestCase{



 function testGetMessages(){
	 //test output, you would need to use the expectOutputString() or expectOutputRegex() methods in your test.
	 //To test for non-empty output, I believe the following should do
	 $this->expectOutputRegex('/./');
	 $messages = new Messages;
	 $json = $messages->getMessages();
 }


}


?>
