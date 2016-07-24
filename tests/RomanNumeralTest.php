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
	}