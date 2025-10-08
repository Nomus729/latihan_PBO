<?php

class EmailValidationException extends Exception
{
    public function getFormattedMessage()
    {
        $filePath = 'C:\xampp\htdocs\php_sit2\exception\handling\latihan11_SoalMultipleExceptionClass.php';
        $errorMessage = "Error caught on line {$this->getLine()} in {$filePath}: {$this->getMessage()}";
        return $errorMessage;
    }
}

$emails = [
    'lab4a@polisub.ac.id',
    'lab4b@polisub.ac.id',
    'lab4c@polisub.ac.id',
    'lab4d@polisub.ac.id',
    'lab5a@polisub.ac.id',
    'lab5b@polisub.ac.id',
    'lab5c@polisub.ac.id',
    'someone@example.com',
];

$lab4Count = 0;
$lab5Count = 0;
$invalidCount = 0;

echo "--- Hasil Pengecekan dan Validasi Email --- <br>";

foreach ($emails as $email) {
    try {
        $errors = [];

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "tidak valid E-mail address";
        }

        if (strpos($email, 'lab4') === false && strpos($email, 'lab5') === false) {
            $errors[] = "tidak mengandung kata 'lab4/lab5'";
        }

        if (!empty($errors)) {
            $fullErrorMessage = "$email " . implode(' dan ', $errors);
            throw new EmailValidationException($fullErrorMessage);
        }
        
        if (strpos($email, 'lab4') !== false) {
            echo "$email mengandung kata 'lab4' dan E-mail valid <br>";
            $lab4Count++;
        } elseif (strpos($email, 'lab5') !== false) {
            echo "$email mengandung kata 'lab5' dan E-mail valid <br>";
            $lab5Count++;
        }

    } catch (EmailValidationException $e) {
        echo $e->getFormattedMessage() . "<br>";
        $invalidCount++;
    }
}

echo "<br>--- Hasil Counting --- <br>";
echo "Terdapat $lab4Count email lab 4 dan $lab5Count email lab 5 <br>";
echo "Terdapat $invalidCount email bukan lab4/5 <br>";

?>