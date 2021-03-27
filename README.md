# What I did.

### Step 1
* First, I saw that the code couldn't work because of simple errors like
```php
class ElectronicItems 
{
     /**
     * @param string $type
     * @return array
     */
    public function getItemsByType($type)
    {
        /**
        * ElectronicItem::$types has private visibility
        */
        if (in_array($type, ElectronicItem::$types)) {
            $callback = function ($item) use ($type) {
                return $item->type == $type;
            };
            $items = array_filter($this->items, $callback);
        }

        return false;
    }
}

class ElectronicItem
{
    private static $types = array(
        self::ELECTRONIC_ITEM_CONSOLE,
        self::ELECTRONIC_ITEM_TELEVISION,
        self::ELECTRONIC_ITEM_MICROWAVE
    );
}
```
 * There were several methods with a broken contract. The return type was declared as an array but really was returned a boolean.
 * Added docker for local environment

### Step 2
Adjusted the code to execute with PHP 8

### Step 3
Big refactoring.
* Changed `ElectronicItem` class into an interface.
* Implemented all require devices from task
* Changed methods in the class `ElectronicItems`

### Step 4
* Added symfony's component `symfony/console` as a way of representation of working business logic
* Added package `myclabs/php-enum` to turn electronic types into Enum object
* Added factory to easily create particular electronic items
* Created a console command to execute a required scenario to buy several items and calculate their price

### Step 5
Supplemented the existing scenario with the new one from question 2

### Step 6
Wrote unit tests for business logic


## To run the script:
`docker-compose run app bin/console purchase`