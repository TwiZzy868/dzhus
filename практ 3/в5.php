<?php
$filename = 'guestbook.txt';

$errors = [];
$success = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $name = isset($_POST['name']) ? trim($_POST['name']) : '';
    $message = isset($_POST['message']) ? trim($_POST['message']) : '';

    if (empty($name)) {
        $errors['name'] = "Ім'я не може бути порожнім";
    }
    
    if (empty($message)) {
        $errors['message'] = "Повідомлення не може бути порожнім";
    }

    if (empty($errors)) {
        $name = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
        $message = htmlspecialchars($message, ENT_QUOTES, 'UTF-8');

        $date = date('Y-m-d H:i:s');

        $entry = json_encode([
            'date' => $date,
            'name' => $name,
            'message' => $message
        ]) . PHP_EOL;
        
        if (file_put_contents($filename, $entry, FILE_APPEND | LOCK_EX)) {
            $success = true;
        } else {
            $errors['file'] = "Помилка при збереженні запису";
        }
    }
}


function getLastEntries($filename, $count = 5) {
    $entries = [];
    
    if (file_exists($filename)) {

        $lines = file($filename);
        
        $lines = array_slice($lines, -$count);
        
        foreach ($lines as $line) {
            $entry = json_decode(trim($line), true);
            if ($entry) {
                $entries[] = $entry;
            }
        }

        usort($entries, function($a, $b) {
            return strtotime($b['date']) - strtotime($a['date']);
        });
    }
    
    return $entries;
}

$lastEntries = getLastEntries($filename, 5);
?>