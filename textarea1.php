<?php
$fileContent = file_get_contents('egzamin.html');

$questionParts = explode('<div class="trescE">', $fileContent);
array_shift($questionParts); //usuwa pierwszy element

$questions = [];

foreach ($questionParts as $question) {
    //pobranie treści pytania do zamykającego diva
    $qTextParts = explode('</div>', $question);
    $qText = strip_tags($qTextParts[0]); //usuwa znaczniki html

    $questions[] = trim($qText); //dodaje pytanie do tablicy
}
//funkcja usuwa numer pytania
function removeQuestionNumber($question) {
    //znajdujemy pierwszą kropkę w tekście
    $dotPos = strpos($question, '.');

    if ($dotPos !== false && $dotPos < 4) { 
        return trim(substr($question, $dotPos + 1)); //tekst po kropce
    }

    return $question;
}
foreach ($questions as $q) {
    echo removeQuestionNumber($q) . "<br>";
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pytania z egzaminu</title>
</head>
<body>

    <h2>Lista pytań z egzaminu</h2>

    <?php foreach ($questions as $index => $question): ?>
        <label>Pytanie <?= $index + 1 ?>:</label>
        <textarea readonly><?php echo htmlspecialchars($question); ?></textarea>
    <?php endforeach; ?>

</body>
</html>
