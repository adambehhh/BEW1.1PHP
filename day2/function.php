<?php
function greetings()
{
    return 'Hello, world!';
}
function fullName($firstName, $lastName)
{
    return $firstName . ' ' . $lastName;
}

$firstName = "Adam";
$lastName = "Beh";

echo fullName($firstName, $lastName);
