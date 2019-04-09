<?php
/**
 * Simple singleton example
 */
class Singleton
{
    private static $me = null;
    private $random = 0;

    /**
     * The contructor should be private to prevent it being called externally
     */
    private function __construct()
    {
        // random number used to illustrate there's only one instance of this class
        $this->random = rand();
    }

    /**
     * Get the single instance of the class
     */
    public static function getInstance()
    {
        if (self::$me === null) {
            self::$me = new Singleton();
        }

        return self::$me;
    }

    /**
     * Get the random number
     */
    public function getNumber()
    {
        return $this->random;
    }
}

// use three times - should output the same everytime
$object1 = Singleton::getInstance();
echo $object1->getNumber()."\r\n";

$object2 = Singleton::getInstance();
echo $object2->getNumber()."\r\n";

$object3 = Singleton::getInstance();
echo $object3->getNumber()."\r\n";
