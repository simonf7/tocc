<?php
/**
 * Comparison class
 */
class Compare
{
    public function __call($function, $args)
    {
        // compare called with two arguments?
        if ($function=='compare' && count($args)==2) {
            // both arguments are strings?
            if (is_string($args[0]) && is_string($args[1])) {
                return strcmp($args[0], $args[1]);
            }
            // both arguments are numbers?
            if (is_numeric($args[0]) && is_numeric($args[1])) {
                return $args[0] <=> $args[1];
            }
        }

        // This should really throw an error
        echo "Call to $function() failed.";
    }
}

$cmp = new Compare();

echo $cmp->compare(12, 10)."\r\n";
echo $cmp->compare('alpba', 'beta')."\r\n";
echo $cmp->compare('equal', 'equal')."\r\n";
echo $cmp->compare('alpha', 2)."\r\n";
