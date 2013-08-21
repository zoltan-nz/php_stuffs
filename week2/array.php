<?

$foo = ["first", "second", "third"];

print_r($foo);
echo($foo[0]);
print($foo);


print_r(each($foo));

foreach ($foo as &$value) {
    echo($value);
}