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
