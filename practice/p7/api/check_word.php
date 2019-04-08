<?php
//Used to check the letter the user inputed in the form, and if the letter is in the word
//Should return an array of booleans as the api
include 'dbConnection.php';
$conn = getDatabaseConnection("hangman");

$randomNum = mt_rand(1, 7);
$sql = "SELECT word_id, word FROM words WHERE word_id = :word_id";

$param["word_id"] = $_GET['word_id'];
$stmt = $conn -> prepare($sql);  
$stmt->execute($param);
$record = $stmt->fetch(PDO::FETCH_ASSOC); 

//Thanks to https://stackoverflow.com/questions/15737408/php-find-all-occurrences-of-a-substring-in-a-string

function strpos_all($haystack, $needle) {
    $offset = 0;
    $allpos = array();
    while (($pos = strpos($haystack, $needle, $offset)) !== FALSE) {
        $offset   = $pos + 1;
        $allpos[] = $pos;
    }
    return $allpos;
}
$result = strpos_all($record["word"], $_GET["letter"]);
echo json_encode($result);


?>