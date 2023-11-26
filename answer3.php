<?php
// Initialize cookies only if they don't exist
if (!isset($_COOKIE['P1Score'])) {
    setcookie('P1Score', '0', time() + 3600);
}
if (!isset($_COOKIE['P2Score'])) {
    setcookie('P2Score', '0', time() + 3600);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Answer Page</title>
    <link rel="stylesheet" href="answer.css">
</head>
<body >
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Initialize currentScore
        $currentScore = 0;

        // Check if player is set
        if (isset($_POST['Player'])) {
            $player = $_POST['Player'];
            $currentScore = ($player == 0) ? (int)$_COOKIE['P1Score'] : (int)$_COOKIE['P2Score'];
        }

        // Process the answer
        if (!empty($_POST['answer'])) {
            if (strcasecmp($_POST["answer"], "woodstock") == 0) {
                $currentScore += 500;
                echo "<h1 class='correct'> Correct Answer!</h1>";
            } else {
                $currentScore -= 500;
                echo "<h1 class='incorrect'> Sorry, Incorrect Answer...</h1>";
            }

            // Update score in the cookie
            if ($player == 0) {
                setcookie('P1Score', $currentScore, time() + 3600);
            } else {
                setcookie('P2Score', $currentScore, time() + 3600);
            }
        } else {
            echo "<h2>Sorry</h2>";
            echo "<p>You didn't submit an answer!</p>";
            echo '<a href="javascript:history.back()">Try again?</a>';
            exit;
        }
    }

    // Display the updated scoreboard
    echo "<h2 class='score'>Scoreboard</h2>";
    echo "<p class='score1' >Player 1 Score: " . ($player == 0 ? $currentScore : intval($_COOKIE['P1Score'])) . "</p>";
    echo "<p class='score2'>Player 2 Score: " . ($player == 1 ? $currentScore : intval($_COOKIE['P2Score'])) . "</p>";
    ?>
    <a href="main.html"> <button type="button" class="button">Main Menu</button></a>
</body>
</html>