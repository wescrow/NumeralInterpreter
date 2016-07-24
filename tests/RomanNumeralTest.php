<?php

	require_once(__dir__ . '../../src/lib/RomanNumeral.php');

	/**
	 * Class RomanNumeralTest
	 * Class for testing the RomanNumeral library.
	 */
	class RomanNumeralTest extends \PHPUnit_Framework_TestCase {


		public function testWhenRomanNumeralIsPassedAValidRomanNumeralItReturnsTrue() {

			$validRomanNumerals = [
				'I', 'III', 'IX', 'MLXVI', 'MCMLXXXIX', 'CXXIII', 'MCMXCIX', 'CCV', 'CMLXXXVII',
				'MCCIX', 'MMCMIV', 'DCCLXXVII', 'CXII'
			];

			foreach ($validRomanNumerals as $validRomanNumeral) {
				$romanNumeral = new RomanNumeral();
				$this->assertEquals(true, $romanNumeral->setValue($validRomanNumeral));
			}
		}

		public function testWhenRomanNumeralPassedInvalidRomanNumeralValueExceptionIsThrown() {

			$invalidRomanNumerals = [
				'.', '~', '`', '!', '@', '#', '$', '%', '^', '&', '*', '(', ')', '-', '_', '=', '+',
			 	'{', '[', '}', ']', '\\', '|', ';', ':', '"', '\'', '<', ',', '>', '?', '/', '0',
			 	'1', '2', '3', '4', '5', '6', '7', '8', '9', 'IIII', 'XXXX', 'CCCC', 'MMMM', 'VV',
			 	'LL', 'DD', 'IIV', 'IIX', 'IL', 'XXL', 'XXC', 'XD', 'CCD', 'CCM', ' ', 'X I'
			];

			foreach ($invalidRomanNumerals as $invalidRomanNumeral) {
				$romanNumeral = new RomanNumeral();
				$isException = false;
				$exceptionMessage = "No exception thrown for invalid Roman Numeral '$invalidRomanNumeral'.";
				try {
					$romanNumeral->setValue($invalidRomanNumeral);
				} catch (Exception $e) {
					$isException = true;
					$exceptionMessage = $e->getMessage();
				}
				$this->assertEquals(true, $isException, $exceptionMessage);
			}
		}
		
		public function testWhenRomanNumeralGetValueIsCalledBeforeSetValueExceptionIsThrown() {

			$romanNumeral = new RomanNumeral();
			$isException = false;
			$exceptionMessage = "No exception thrown.";
			try {
				$romanNumeral->getValue();
			} catch (Exception $e) {
				$isException = true;
				$exceptionMessage = $e->getMessage();
			}
			$this->assertEquals(true, $isException, $exceptionMessage);
		}

		public function testWhenRomanNumeralGetValueIsCalledAfterSetValueValueIsReturned() {

			$validRomanNumerals = [
				'I', 'III', 'IX', 'MLXVI', 'MCMLXXXIX', 'CXXIII', 'MCMXCIX', 'CCV', 'CMLXXXVII',
				'MCCIX', 'MMCMIV', 'DCCLXXVII', 'CXII'
			];

			foreach ($validRomanNumerals as $validRomanNumeral) {
				$romanNumeral = new RomanNumeral();
				$value = null;
				$exceptionMessage = "No exception thrown.";
				try {
					$romanNumeral->setValue($validRomanNumeral);
					$value = $romanNumeral->getValue();
				} catch (Exception $e) {
					$exceptionMessage = $e->getMessage();
				}
				$this->assertEquals($validRomanNumeral, $value, $exceptionMessage);
			}
		}

	}