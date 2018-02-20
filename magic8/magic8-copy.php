<?php
session_start;
//Did User ask a Question
if(isset($_POST["txtQuestion"])){
    $question = $_POST["txtQuestion"];
}else{
    $question = "";
}

//Session Variable - Gives ability to cache the last question asked. It will persist on the server for the longevity of the session.
if (isset($_SESSION["PrevQuest"])) {

    $PrevQuest = $_SESSION["PrevQuest"]; //Takes it out of the session variable & puts it in the local variable

} else {

    $PrevQuest = "";

}
// Create a Response array
// Ask a question - How will I do this semester?
//Must end in a question mark
//Cannot ask the same question in a row
//It will randomly create a response for us

$answer ="ASK ME A QUESTION!!";

//Fill a list of responses
$responses = array();
$responses[0] = "It is certain";
$responses[1] = "It is decidedly so";
$responses[2] = "Without a doubt";
$responses[3] = "Yes, Definitely";
$responses[4] = "You may rely on it";
$responses[5] = "As I see it, Yes";
$responses[6] = "Most likely";
$responses[7] = "Outlook good";
$responses[8] = "Yes";
$responses[9] = "Signs point to yes";
$responses[10] = "Reply hazy, try again";
$responses[11] = "Ask again later";
$responses[12] = "Better not tell you now";
$responses[13] = "Cannot predict now";
$responses[14] = "Concentrate & ask again";
$responses[15] = "Don't count on it";
$responses[16] = "My reply is no";
$responses[17] = "My sources say no";
$responses[18] = "Outlook not so good";
$responses[19] = "Very doutbful";

if($question=="") {
    $answer = "ASK ME A QUESTION!!";
} elseif (substr($question, -1) != "?") {
    $answer = "AN ENDING QUESTION MARK ( ? ) IS REQUIRED!";
}
elseif($PrevQuest == $question) {
    $answer = "PLEASE ASK A NEW QUESTION!";
}else {
    $iResponse = mt_rand(0, 19); //mt_rand gives a random number with a minimum & maximum number
    $answer = $responses[$iResponse]; //Change the 4 to iResponse
    $_SESSION["PrevQuest"] = $question; //puts the question to server memory
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Magic 8 Ball</title>
    <link rel="stylesheet" type="text/css" href="../css/styles.css"/>

</head>

<body>
<div class="page-wrap">
    <header class="site-header">
        <?php include '../includes/header.php' ?>
    </header>

    <div class="flex-box">
        <nav class="main-nav" role="navigation">
            <?php include '../includes/menu.php' ?>
        </nav>
        <section class="main-content center">
            <h2 class="title">Try the Magic 8 Ball!</h2>

            <div>
                <div class="marquee">
                    <marquee><?=$answer?></marquee>
                </div>

                <label>Ask a Question:</label>
                <form method="post" action="magic8-copy.php">
                    <input type="text" name="txtQuestion" id="txtQuestion" value="<?=$question?>">
                    <input type="submit" value="Ask the 8 Ball">
                </form>
            </div>

        </section>

        <aside class="right-sidebar">
            Sidebar
        </aside>
    </div>

    <footer>
        <?php include '../includes/footer.php' ?>
    </footer>
</div>

</body>

</html>