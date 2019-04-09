# The Original Cottage Company

## Web Developer recruitment test

#### Part 1: General Programming

- A class

  ```php
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
  ```

- An object

  Creating a object of class cottage -

  ```php
  // instantiate
  $myCottage = new Cottage();
  ```

- Calling a method of a class

  ```php
  // maintain the cottage
  $myCottage->doMaintenance();
  ```

  Should output -

  ```
  $ php cottage.php
  check heating
  check plumbing
  check electrics
  ```

- Class inheritance

  Creating a thatched cottage -

  ```php
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
  }
  ```

- Method overloading

  Is this method overloading as in calling functions the same name but with different parameters, or method overriding as in replacing a method in the base class by declaring it in an inherited class?

1. Method overriding

   Using the cottage example -

   ```php
   /**
    * Example class for a thatched cottage
    */
   class ThatchedCottage extends Cottage
   {
       /**
        * Initialise the object
        */
       public function __construct()
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
   ```

   Instantiating and calling `doMaintenance` should output -

   ```
   $ php thatched.php
   check heating
   check plumbing
   check electrics
   check the thatched roof
   ```

2) Method overloading

   PHP doesn't implement function overloading as C++ or Java would do, for example -

   ```java
   compare(float a, float b) {}
   compare(String a, String, b) {}
   ```

   Using `compare(1, 2)` or `compare("one", "two")` the compiler will use the correct version of the function.

   This can be emulated using the PHP magic function `__call` - a simple class to implementing a function `compare` to compare either numbers or strings -

   ```php
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
   ```

   To test -

   ```php
   $cmp = new Compare();

   echo $cmp->compare(12, 10)."\r\n";
   echo $cmp->compare('alpba', 'beta')."\r\n";
   echo $cmp->compare('equal', 'equal')."\r\n";
   echo $cmp->compare('alpha', 2)."\r\n";
   ```

   The above should output -

   ```
   $ php compare.php
   1
   -1
   0
   Call to compare() failed.
   ```
