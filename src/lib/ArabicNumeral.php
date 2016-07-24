<?php

	/**
	 * Class ArabicNumeral
	 */
	class ArabicNumeral {

		public function setValue($input) {

			if (preg_match('/^[0-9]+$/', $input)) {
				return true;
			} else {
				throw new Exception("Input '$input' is not a valid value for an Arabic Numeral.");
			}
		}
	}