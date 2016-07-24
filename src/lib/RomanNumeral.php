<?php

	/**
	 * Class RomanNumeral
	 */
	class RomanNumeral {


		public function setValue($input) {

			if (preg_match('/^M{0,3}(CM|CD|D?C{0,3})(XC|XL|L?X{0,3})(IX|IV|V?I{0,3})$/', $input)) {
				return true;
			} else {
				throw new Exception("Input '$input' is not a valid value for an Roman Numeral.");
			}
		}
	}