<?php

// Create and include a configuration file with the database connection
include('config.php');

// Include functions for application
include('functions.php');

// Get search term from URL using the get function
$term = get('search-term');

// Get a list of books using the searchBooks function
// Print the results of search results
// Add a link printed for each book to book.php with an passing the isbn
// Add a link printed for each book to form.php with an action of edit and passing the isbn
$songs = searchSongs($term, $database);

?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	
  	<title>Books</title>
	<meta name="description" content="Gorillaz Store">
	<meta name="author" content="Clay Napier">

	<link rel="stylesheet" href="css/style.css">

	<!--[if lt IE 9]>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script>
  	<![endif]-->
</head>
<body>
    <div class="box">
        <h1>Songs</h1>
        <form method="GET">
            <input type="text" name="search-term" placeholder="Search..." />
            <input type="submit" />
        </form>
        <?php foreach($songs as $song) : ?>
            <p>
                <?php echo $song['songName']; ?><br />
                <?php echo $song['artist']; ?> <br /><?php echo $song['price']; ?> <br />
                <a href="form.php?action=edit&songID=<?php echo $song['songID'] ?>">Edit Song</a><br />
                <a href="song.php?songID=<?php echo $song['songID'] ?>">View Song</a>
            </p>
        <?php endforeach; ?>
        
        <p>
            <?php $songs['songID'] == 1; echo $songs['songName']; ?> <br /> By: <?php $songs['songID'] == 1; echo $songs['artist']; ?><br />
            <img src="HumanzAlbum.png" alt="Humanz">
        </p>
        <p>
            <?php $songs['songID'] == 2; echo $songs['songName']; ?> <br /> By: <?php $songs['songID'] == 2; echo $songs['artist']; ?><br />
            <img src="HumanzAlbum.png" alt="Humanz">
        </p>
        <p>
            <?php $songs['songID'] == 3; echo $songs['songName']; ?> <br /> By: <?php $songs['songID'] == 3; echo $songs['artist']; ?><br />
            <img src="GorillazAlbum.jpg" alt="Gorillaz">
        </p>
        <p>
            <?php $songs['songID'] == 4; echo $songs['songName']; ?> <br /> By: <?php $songs['songID'] == 4; echo $songs['artist']; ?><br />
            <img src="GorillazAlbum.png" alt="Gorillaz">
        </p>
        <p>
            <?php $songs['songID'] == 5; echo $songs['songName']; ?> <br /> By: <?php $songs['songID'] == 5; echo $songs['artist']; ?><br />
            <img src="DemonDaysAlbum.png" alt="Demon Days">
        </p>
        <p>
            <?php $songs['songID'] == 6; echo $songs['songName']; ?> <br /> By: <?php $songs['songID'] == 6; echo $songs['artist']; ?><br />
            <img src="DemonDaysAlbum.png" alt="Demon Days">
        </p>
        <p>
            <?php $songs['songID'] == 7; echo $songs['songName']; ?> <br /> By: <?php $songs['songID'] == 7; echo $songs['artist']; ?><br />
            <img src="PlasticBeachAlbum.png" alt="Plastic Beach">
        </p>
        <p>
            <?php $songs['songID'] == 8; echo $songs['songName']; ?> <br /> By: <?php $songs['songID'] == 8; echo $songs['artist']; ?><br />
            <img src="PlasticBeachAlbum.png" alt="Plastic Beach">
        </p>
        
    </div>
</body>
<footer>
    <!-- print currently accessed by the current username -->
    <p>Currently logged in as: <?php echo $customer->getCustomerName(); ?></p>
    <br />
    
	<!-- A link to the logout.php file --> 
	<p>
		<a href="logout.php">Log Out</a>
	</p>
</footer>
</html>