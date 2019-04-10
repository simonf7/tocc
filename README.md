# The Original Cottage Company

## Web Developer recruitment test

### Part 1: General Programming

The `part1` folder contains PHP files to support the answers below.

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

  Run the following to test which should output -

  ```bash
  $ php part1/cottage.php
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

   ```bash
   $ php part1/thatched.php
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

   This can be emulated using the PHP magic function `__call` - a simple class to implement a function `compare` to compare either numbers or strings -

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

   ```bash
   $ php part1/compare.php
   1
   -1
   0
   Call to compare() failed.
   ```

- Singleton

  Simple class that creates a random number. As this is a singleton the same random number should be returned -

  ```php
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
  ```

  To test -

  ```php
  $ php part1/singleton.php
  ```

  The exact same number should be output three times.

  ##### Singleton uses

  A possible use of a singleton would be a database connection where in general you only want one connection to be made.

  Another could be for logging as there would normally be a single log file so you might only want one object writing to it.

### Problem - Factorial Function

Below is a simple recursive function to calculate the factorial of a number -

```php
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
```

Adding some code to test the function with the supplied answers of 6! = 720 and 4! = 24 -

```php
// test the function
echo "6! = ".factorial(6)."\r\n";
echo "4! = ".factorial(4)."\r\n";
```

Running this should output -

```bash
$ php factorial/factorial.php
6! = 720
4! = 24
```

### Frontend Task

All files related to this task are within the `frontend` folder.

A basic workflow using Gulp and SASS has been set up, for development the .html and .scss files are in the `dev` folder. To begin development make sure npm is installed and run (making sure you are in the `frontend` folder) -

```bash
$ npm install
```

To make any changes, first run -

```bash
$ gulp watch
```

A browser will be opened and any changes made to `dev/index.html` or any .scss files will be automatically reflected.

##### Distribution

A second gulp task has been added which copies the required files for distribtion -

```bash
$ gulp dist
```

This copies `index.html` and `styles.css` to the `dist` folder. I've added these to the GIT repository as my submission for this part of the test - normally the `dist` folder would be added to the `.gitignore` file and not included in the repository.

In a full project the CSS file would also be minified while being prepared for distribution/release.

##### Observations

I've made a few assumptions while implementing this solutions and in a "real" project would go back to the designer and/or project lead for clarification.

- I've assumed the text shown in each form field is meant to be a placeholder to highlight the function of the field.

- As I've assumed the design shows placeholders these aren't very accessible and there should ideally be some labels which accessibility tools such as screen readers look for.

- I've made an educated guess at the field text colour as placeholders tend to be lighter.

- I've selected web safe fonts which I think look close to the design.

- I've taken the liberty of adding some simple mouse over colours changes to each form element.

- A further development would be the addition of client side error checking, for example preventing submission of incorrectly formatted email addresses or required fields not being filled in.
