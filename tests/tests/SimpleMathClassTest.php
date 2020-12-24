<?php

use PHPUnit\Framework\TestCase;
require_once "../src/SimpleMathClass.php";
use src\SimpleMathClass;

class SimpleMathClassTest extends TestCase {

	public function testSum () {
		$simpleMath = new SimpleMathClass();
		$value1 = 1;
		$value2 = 2;
		$returnValue = $simpleMath->sum($value1, $value2);
		$this->assertEquals($value1 + $value2, $returnValue);
	}

}
