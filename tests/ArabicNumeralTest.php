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

		public function testWhenArabicNumeralIsPassedNonIntegerItThrowsException() {

			$nonIntegers = ['A', 'a', '', 1.2, null];

			foreach ($nonIntegers as $nonInteger) {
				$arabicNumeral = new ArabicNumeral();
				$isException = false;
				$exceptionMessage = "No exception thrown for non integer '$nonInteger'.";
				try {
					$arabicNumeral->setValue($nonInteger);
				} catch (Exception $e) {
					$isException = true;
					$exceptionMessage = $e->getMessage();
				}
				$this->assertEquals(true, $isException, $exceptionMessage);
			}
		}

		public function testWhenArabicNumeralGetValueIsCalledOnObjectThatHasNoSetValueExceptionIsThrown() {
			$arabicNumeral = new ArabicNumeral();
			$isException = false;
			$exceptionMessage = 'No exception thrown.';
			try {
				$arabicNumeral->getValue();
			} catch (Exception $e) {
				$isException = true;
				$exceptionMessage = $e->getMessage();
			}
			$this->assertEquals(true, $isException, $exceptionMessage);
		}

		public function testWhenArabicNumeralGetValueIsCalledAfterSuccessfulSetValueThatTheValueIsReturned() {
			$arabicNumeral = new ArabicNumeral();
			$exceptionMessage = 'No exception thrown.';
			$value = null;
			try {
				$arabicNumeral->setValue(1);
				$value = $arabicNumeral->getValue();
			} catch (Exception $e) {
				$exceptionMessage = $e->getMessage();
			}
			$this->assertEquals(1, $value, $exceptionMessage);
		}
	}