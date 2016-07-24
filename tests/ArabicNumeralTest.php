<?php

	require_once(__dir__ . '../../src/lib/ArabicNumeral.php');

	/**
	 * Class ArabicNumeralTest
	 * Class for testing the ArabicNumeral library.
	 */
	class ArabicNumeralTest extends \PHPUnit_Framework_TestCase {

		public function testWhenArabicNumeralIsPassedAnIntegerItReturnsTrue() {
			$arabicNumeral = new ArabicNumeral();
			$this->assertEquals(true, $arabicNumeral->setValue(1));
			$this->assertEquals(true, $arabicNumeral->setValue(2));
			$this->assertEquals(true, $arabicNumeral->setValue(3));
			$this->assertEquals(true, $arabicNumeral->setValue(4));
			$this->assertEquals(true, $arabicNumeral->setValue(5));
		}
	}