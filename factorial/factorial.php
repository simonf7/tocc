<?php
/**
 * Function to calculate the factorial of a number
 *
 * @param int number to create the factorial of
 *
 * @return the calculated factorial
 */
function factorial($number)
{
    if ($number > 1) {
        return $number * factorial($number - 1);
    }

    return 1;
}

// test the function
echo "6! = ".factorial(6)."\r\n";
echo "4! = ".factorial(4)."\r\n";
