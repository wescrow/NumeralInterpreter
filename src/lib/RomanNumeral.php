<?php

	/**
	 * Class RomanNumeral
	 */
	class RomanNumeral {

		/**
		 * The value of the object.
		 * @var $value null
		 */
		private $value = null;

		/**
		 * setValue
		 * Set's the value of the object if the value is valid.
		 * @param $input The value attempting to be set.
		 * @return bool Whether or not the value was set.
		 * @throws Exception If the value inputted was invalid an exception is thrown.
		 */
		public function setValue($input) {

			if (preg_match('/^M{0,3}(CM|CD|D?C{0,3})(XC|XL|L?X{0,3})(IX|IV|V?I{0,3})$/', $input)) {
				$this->value = $input;
				return true;
			} else {
				throw new Exception("Input '$input' is not a valid value for an Roman Numeral.");
			}
		}

		/**
		 * getValue
		 * Returns the value of the object if set.
		 * @return string The value of the object.
		 * @throws Exception Thrown if no value is set.
		 */
		public function getValue() {

			if (is_null($this->value)) {
				throw new Exception('The value for this Roman Numeral has not been set.');
			} else {
				return $this->value;
			}
		}
	}