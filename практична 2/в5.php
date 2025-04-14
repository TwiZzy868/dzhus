<?php
$errors = [];
$values = [];

function required($value) {
    return !empty(trim($value)) ? true : 'Це поле обов\'язкове для заповнення';
}

function isValidEmail($value) {
    return filter_var($value, FILTER_VALIDATE_EMAIL) ? true : 'Введіть коректну email адресу';
}

function minLength($value, $min) {
    return strlen($value) >= $min ? true : "Мінімальна довжина - $min символів";
}


function validateForm($data, $rules) {
    $errors = [];
    
    foreach ($rules as $field => $fieldRules) {
        foreach ($fieldRules as $rule) {
            $result = $rule($data[$field]);
            
            if ($result !== true) {
                if (!isset($errors[$field])) {
                    $errors[$field] = [];
                }
                $errors[$field][] = $result;
                break; 
            }
        }
    }
    
    return $errors;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $formData = [
        'name' => $_POST['name'] ?? '',
        'email' => $_POST['email'] ?? '',
        'password' => $_POST['password'] ?? ''
    ];

    $values = $formData;
    
    $rules = [
        'name' => [
            function($value) { return required($value); }
        ],
        'email' => [
            function($value) { return required($value); },
            function($value) { return isValidEmail($value); }
        ],
        'password' => [
            function($value) { return required($value); },
            function($value) { return minLength($value, 6); }
        ]
    ];
    
  
    $errors = validateForm($formData, $rules);
    
    if (empty($errors)) {
        $successMessage = "Реєстрація успішна! Вітаємо, " . htmlspecialchars($formData['name']);
    }
}
?>