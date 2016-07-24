# NumeralInterpreter
These are some numeral classes that allow the user to interpret Arabic Numerals to Roman Numerals and vice versa.

## Methodology
This project was completed using the Test Driven Design paradigm. 

## Project Objects

### ArabicNumeral
A basic class that allows for the input and validation of Arabic Numerals and the retrieval of successfully set values.

### RomanNumeral
A basic class that allows for the input and validation of Roman Numerals and the retrieval of successfully set values.

### AbastractNumeral
This class abstracts out some of the commonalities between the ArabicNumeral and the RomanNumeral classes while 
enforcing that child objects implement necessary functions.

### NumeralInterpreter
This class interprets ArabicNumeral objects into RomanNumeral objects and vice versa.
