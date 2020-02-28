<?php
include_once("db_connect.php");




$name = $_POST['name'];

$answer1 = $_POST['question-1-answers'];

$answer2 = $_POST['question-2-answers'];

$answer3 = $_POST['question-3-answers'];

$answer4 = $_POST['question-4-answers'];

$answer5 = $_POST['question-5-answers'];



$totalCorrect = 0;
echo "$name";
if ($answer1 == "B") { $totalCorrect++; echo " Q1 $answer1 is correct";}
else{echo " Q1 $answer1 is incorrect";}
if ($answer2 == "B") { $totalCorrect++; echo " Q2 $answer2 is correct"; }
else{echo " Q2 $answer2 is incorrect";}
if ($answer3 == "C") { $totalCorrect++; echo " Q3 $answer3 is correct";}
else{echo " Q3 $answer3 is incorrect";}
if ($answer4 == "B") { $totalCorrect++; echo " Q4 $answer4 is correct";}
else{echo " Q4 $answer4 is incorrect";}
if ($answer5 == "A") { $totalCorrect++; echo " Q5 $answer5 is correct";}
else{echo " Q5 $answer5 is incorrect";}
echo "<div id='results'>$totalCorrect / 5 correct</div>";

$mysql_insert = "INSERT INTO quiz (userid, answer1, answer2, answer3, answer4, answer5, result)VALUES
('$name', '$answer1', '$answer2', '$answer3', '$answer4', '$answer5', '$totalCorrect / 5 correct')";
if (mysqli_query($conn, $mysql_insert)) {
            echo "New record created successfully";
        } else {
             echo "Error: " . $mysql_insertl . "<br>" . mysqli_error($conn);
        }
?>
<form>
  <input type="button" value="Back!" onclick="history.back()">
</form>