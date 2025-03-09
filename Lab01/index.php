<?php

$students = [[

    "name" => 'John Doe',

    "age" => 20,

    "grades" => [85, 90, 78]

], [
    "name" => 'Stiven',

    "age" => 22,

    "grades" => [70, 75, 78]
], [
    "name" => 'marko',
    "age" => 23,
    "grades" => [90, 90, 24]

], [
    "name" => 'jonathan',
    "age" => 20,
    "grades" => [60, 63, 70]
], [
    "name" => 'drake',
    "age" => 20,
    "grades" => [90, 83, 80]
]];


function calculateAverage($grades)
{
    return array_sum($grades)/count($grades);
}

$average = 0;
foreach ($students as $student) {
    $average += calculateAverage($student['grades']);
    echo "Average: ". $average . "<br>";
}


function filterByAge($students, $givenAge){
    echo "Filter by Age function: ";
    foreach ($students as $student) {
        if ($student['age'] > $givenAge) {
            echo $student['name'] ." - ". $student['age'] . "<br>";
        }
    }
}

$givenAge = 20;
echo "\n".filterByAge($students, $givenAge);

function capitalizeNames($students){
    foreach ($students as $student){
        $student['name']  = ucfirst($student['name']);
        echo $student['name']."  ";
    }
}

capitalizeNames($students);

function displayStudents($students){
    foreach ($students as $student){
        echo "Name: ".$student['name']. "<br>";
        echo "Age: ".$student['age']. "<br>";
        echo "Average Grade:".calculateAverage($student["grades"]). "<br>";
    }
}

displayStudents($students);
echo "----------------------------- <br>";

sort($students);
displayStudents($students);