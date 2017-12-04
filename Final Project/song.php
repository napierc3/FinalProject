<?php

// Include functions for application
include('functions.php')

//Include functions
include('functions.php');

// Get the song ID from the URL
$songID = get('songID');

// Get a list of songs from the database with the song ID passed in the URL
$sql = file_get_contents('sql/getSong.sql');
$params = array(
    'songID' => $songID
);
$statement = database->prepare($sql);
$statement->execute($params);
$songs = $statement->fetchAll(PDO::FETCH_ASSOC);

// Set $song equal to the first song in $songs
$song = $songs[0];

// Get albums of song from the database
$sql = file_get_contents('sql/getSongAlbum.sql');
$params = array(
    'songID' => $songID
);
$statement = $database->prepare($sql);
$statement->execute($params);
$albums = $statement->fetchAll(PDO::FETCH_ASSOC);
 
?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	
  	<title>Song</title>
	<meta name="description" content="Gorillaz Store">
	<meta name="author" content="Clay Napier">

	<link rel="stylesheet" href="css/style.css">

	<!--[if lt IE 9]>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script>
  	<![endif]-->
</head>
<body>
    <div class="box">
        <h1><?php echo $song['songName'] ?></h1>
        <p>
            <?php echo $song['songArtist']; ?><br />
            <?php echo $song['price']; ?><br />
        </p>
        <ul>
            <?php foreach($albums as $album) : ?>
                <li><?php echo $album['albumName'] ?></li>
            <?php endforeach; ?>
        </ul>
        <form action="form.php">
            <input type="hidden" name="songID" value="songID">
            Quantity: <input type="text" name="quantity">
            <input type="submit" value="Submit">
        </form>
        
        <?php
        
        $cart = new ShoppingCart;
        $_SESSION["cart"] = &$cart;
        $cart->songID = $songID;
        $cart->quantity = $quantity;
        
        ?>
        
    </div>
</body>
</html>