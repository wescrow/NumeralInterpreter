<?php

	/**
	 * Class RomanNumeral
	 */
	class RomanNumeral {

		private $value = null;

		public function setValue($input) {

			if (preg_match('/^M{0,3}(CM|CD|D?C{0,3})(XC|XL|L?X{0,3})(IX|IV|V?I{0,3})$/', $input)) {
				return true;
			} else {
				throw new Exception("Input '$input' is not a valid value for an Roman Numeral.");
			}
		}

		public function getValue() {

			if (is_null($this->value)) {
				throw new Exception('The value for this Arabic Numeral has not been set.');
			}
		}
	}