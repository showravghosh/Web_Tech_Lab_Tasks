<?php
header('Content-Type: application/json');

$student = [
    "id" => 101,
    "name" => "Showrav Ghosh",
    "email" => "showrav@example.com",
    "department" => "Computer Science"
];

echo json_encode($student);
