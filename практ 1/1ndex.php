<?php
$name = 'Andrii';
$age = 25;
$is_student = true;
 echo "my name ${name} мені ${age} років, і я";
 if ($is_student == true) {
    echo "і я є студент";
 } else {
    echo "і я не є студентом.";
}
echo "<br><br>";
$numbers = [1, 2, 3, 4, 5];
echo "масив містить числа: ";
foreach ($numbers as $number) {
    echo $number . " ";
}
echo "<br>";
$sum = 0; 
foreach ($numbers as $number) {
    $sum = $sum + $number;
}
echo "Сума всіх чисел: " . $sum . "<br><br>";
$contact = [
    "name" => "Петро Іваненко",
    "email" => "petro@example.com",
    "phone" => "+380991234567"
];
echo "<ul>";
foreach ($contact as $key => $value) {
    echo "<li>" . $key . ": " . $value . "</li>";
}
echo "</ul>";
echo "Перевіряємо вік: " . $age . " років<br>";
if ($age > 18) {
    
    echo "Ви повнолітній!<br><br>";
} else {
    
    echo "Ви неповнолітній!<br><br>";
}
$grade = 75;
echo "Ваша оцінка: " . $grade . " балів<br>";


if ($grade >= 90 && $grade <= 100) {
    
    echo "Це відмінно!";
} elseif ($grade >= 70 && $grade < 90) {
    echo "Це добре!";
} elseif ($grade >= 50 && $grade < 70) {
    echo "Це задовільно!";
} else {
    
    echo "Це незадовільно!";
}
?>
