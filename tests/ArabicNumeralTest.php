<?php

	require_once(__dir__ . '../../src/lib/ArabicNumeral.php');

	/**
	 * Class ArabicNumeralTest
	 * Class for testing the ArabicNumeral library.
	 */
	class ArabicNumeralTest extends \PHPUnit_Framework_TestCase {


		/**
		 * Test When ArabicNumeral Is Passed An Integer It Returns True
		 */
		public function testWhenArabicNumeralIsPassedAnIntegerItReturnsTrue() {

			foreach (range(1, 5) as $integer) {
				$arabicNumeral = new ArabicNumeral();
				$exceptionMessage = "No exception was thrown.";
				$value = null;
				try {
					$value = $arabicNumeral->setValue($integer);
				} catch (Exception $e) {
					$exceptionMessage = $e->getMessage();
				}
				$this->assertEquals(true, $value, $exceptionMessage);
			}
		}

		/**
		 * testWhenArabicNumeralIsPassedNonIntegerItThrowsException
		 * This tests that when an ArabicNumeral object is set with a non-integer that it throws an exception.
		 */
		public function testWhenArabicNumeralIsPassedNonIntegerItThrowsException() {

			foreach (['A', 'a', '', 1.2, null] as $nonInteger) {
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

		/**
		 * testWhenArabicNumeralGetValueIsCalledOnObjectThatHasNoSetValueExceptionIsThrown
		 * This tests when that when the getValue() function of an Arabic Numeral is called before the setValue()
		 * function an exception is thrown.
		 */
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

		/**
		 * testWhenArabicNumeralGetValueIsCalledAfterSuccessfulSetValueThatTheValueIsReturned
		 * This tests that when the getValue() function of an ArabicNumeral is called after the successful setValue()
		 * function is called, the value that was set gets returned.
		 */
		public function testWhenArabicNumeralGetValueIsCalledAfterSuccessfulSetValueThatTheValueIsReturned() {

			foreach (range(1, 5) as $integer) {
				$arabicNumeral = new ArabicNumeral();
				$exceptionMessage = 'No exception thrown.';
				$value = null;
				try {
					$arabicNumeral->setValue($integer);
					$value = $arabicNumeral->getValue();
				} catch (Exception $e) {
					$exceptionMessage = $e->getMessage();
				}
				$this->assertEquals($integer, $value, $exceptionMessage);
			}
		}
	}