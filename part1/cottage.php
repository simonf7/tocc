<?php
/**
 * Example class for a cottage
 */
class Cottage
{
    /**
     * Initialise the object
     */
    public function __construct()
    {
        //
    }

    /**
     * Maintain the cottage
     */
    public function doMaintenance()
    {
        echo "check heating\r\n";
        echo "check plumbing\r\n";
        echo "check electrics\r\n";
    }
}

// instantiate
$myCottage = new Cottage();

// maintain the cottage
$myCottage->doMaintenance();
