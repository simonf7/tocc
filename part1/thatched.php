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

/**
 * Example class for a thatched cottage
 */
class ThatchedCottage extends Cottage
{
    /**
     * Initialise the object
     */
    public function _construct()
    {
        parent::__construct();

        // specific to this extended class
    }

    /**
     * Maintain the thatched cottage
     */
    public function doMaintenance()
    {
        // perform standard cottage maintenance
        parent::doMaintenance();

        echo "check the thatched roof\r\n";
    }
}

// instantiate
$myCottage = new ThatchedCottage();

// maintain the cottage
$myCottage->doMaintenance();
