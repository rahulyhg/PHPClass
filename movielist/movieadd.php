<?php
if (isset($_POST["txtTitle"])){  // Testing to see if user submitted the form
    if (isset($_POST["txtRating"])){
        $title = $_POST["txtTitle"];
        $rating = $_POST["txtRating"];

        //Database connection stuff
        include '../includes/dbConn.php';
        try{
            $db = new PDO($dsn, $username, $password, $options);
            $sql = $db->prepare("insert into movielist (movieTitle,movieRating) VALUE(:Title, :Rating)");
            $sql->bindValue(":Title",$title);
            $sql->bindValue(":Rating",$rating);
            $sql->execute();

        }catch (PDOException $e){
            $error = $e ->getMessage();
            echo "Error: $error";
        }
       header("Location:movielist.php");
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Movie</title>
    <link rel="stylesheet" type="text/css" href="../css/styles.css"/>
    <link rel="stylesheet" type="text/css" href="../css/forms.css"/>
    <link rel="stylesheet" type="text/css" href="../css/buttons.css"/>


</head>

<body>
<div class="page-wrap">
    <header class="site-header">
        <?php include '../inc/header.php' ?>
    </header>

    <div class="flex-box">
        <nav class="main-nav" role="navigation">
            <?php include '../inc/menu.php' ?>
        </nav>
        <section class="main-content" role="main">
            <h2 class="title">Add New Movie</h2>
            <div class="form">
                <form method="post" style="width:500px;
                    <label for="title">Movie Title</label>
                    <input type="text" id="txtTitle" name="txtTitle" placeholder="Movie title.." required>
                    <label for="title">Movie Rating</label>
                    <input type="text" id="txtRating" name="txtRating" placeholder="Movie Rating.." required>
                    <input type="submit" value="Add Movie">

                    <a class="button" href="#0" onclick="history.go(-1); return(false)">Cancel</a>
                </form>


            </div>
        </section>


        <aside class="right-sidebar">
            Sidebar
        </aside>
    </div>

    <footer>
        <?php include '../inc/footer.php' ?>
    </footer>
</div>

</body>

</html>