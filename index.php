<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Friend book</title>
    <meta name="author"    content="Johan Boulben"/>
    <meta name="copyright" content="2018-2019 Johan Boulben"/>
    <meta charset="UTF-8">
    <title>Friend book</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
    Friend book
</header>
<form action="index.php" method="post">
    Name: <input type="text" name="name">
    <input type="submit" value="Add a friend">
</form>
<?php
$filename = 'friends.txt';
$nameFilter = null;
if (isset($_POST["name"])){
    $name = $_POST["name"]."\n";
}
$file = fopen( $filename, "a" );
fwrite( $file, $name );
fclose($file);
?>
<h1>
    My best friends
</h1>
<p>
    <?php
    $file = fopen( $filename,"r" );
    $line = fgets($file);
    while (!feof($file)){
        if ($_POST['nameFilter'] and $_POST['nameFilter'] != ''){
            $line = strstr($line, $_POST['nameFilter']);
        }
        if ($line != '')
        {
            echo "<li>$line</li>";
        }
        $line = fgets($file);
    }

    fclose($file);
    ?>
</p>
<form action="index.php" method="post">
    Filter:<input type="text" name="nameFilter" value="<?=$nameFilter?>">
    <input type="submit" value="Filter list">
</form>
</body>
<footer>
    Homework - Johan Boulben
</footer>
</html>
