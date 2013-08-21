<?php
class MyClass
{
    public $var1 = 'value 1';
    public $var2 = 'value 2';
    public $var3 = 'value 3';

    protected $protected = 'protected var';
    private   $private   = 'private var';

    function iterateVisible() {
        echo "MyClass::iterateVisible:\n";
        foreach($this as $key => $value) {
            print "$key => $value\n";
        }
    }
}

$class = new MyClass();

foreach($class as $key => $value) {
    print "$key => $value\n";
}
echo "\n";


$class->iterateVisible();

class Dwarves {

    public $all = ["Sleepy", "Dopey", "Doc", "Bashful", "Grumpy", "Happy", "Sneezy"];
}

$myDwarves = new Dwarves();

foreach($myDwarves->all as $key => $value) {
    print "$key => $value \n";
}

var_dump($myDwarves);

class Rainbow {
    public $quote = "Richard Of York Gave Battle In Vain";

    function splitter() {

    }

    function size() {
        count($this->quote);
    }

    function iterate() {

    }
}

echo '<p> New section </p>';

$myRainbow = new Rainbow;

echo '<p> Size: ' . $myRainbow->size() . '</p>';