<?php

// Create and include a configuration file with the database connection
include('config.php');

// Include functions for application
include('functions.php');

// Get type of form either add or edit from the URL (ex. form.php?action=add) using the newly written get function
$action = $_GET['action'];

// Get the song ID number from the URL if it exists using the newly written get function
$songID = get('songID');

// Initially set $song to null
$song = null;

// Initially set $albums to an empty array
$song_album = array();

// If song ID is not empty, get song record into $song variable from the database
// Set $song equal to the first song in $songs
// Set $albums equal to a list of categories associated to a song from the database
if(!empty($songID)) {
    $sql = file_get_contents('sql/getSong.sql');
    $params = array(
        'songID' => $songID
    );
    $statement = $database->prepare($sql);
	$statement->execute($params);
	$songs = $statement->fetchAll(PDO::FETCH_ASSOC);
    
    $song = $songs[0];
    
    // Get albums
    $sql = file_get_contents('sql/getSongAlbum.sql');
    $params = array(
        'songID' => $songID
    );
    $statement = $database->prepare($sql);
	$statement->execute($params);
	$song_album_associative = $statement->fetchAll(PDO::FETCH_ASSOC);
    
    foreach($song_album_associative as $album) {
        $song_album[] = $album['albumID'];
    }
}

// Get an associative array of albums
$sql = file_get_contents('sql/getAlbums.sql');
$statement = $database->prepare($sql);
$statement->execute($params);
$albums = $statement->fetchAll(PDO::FETCH_ASSOC);

// If form submitted
if ($SERVER['REQUEST_METHOD'] == 'POST') {
    $songID = $_POST['songID'];
    $songName = $_POST['song-name'];
    $song_album = $_POST['song-album'];
    $artist = $_POST['song-artist'];
    $price = $_POST['song-price'];
    
    if($action == 'add') {
        // Insert song
        $sql = file_get_contents('sql/insertSong.sql');
        $params = array(
            'songID' => $songID,
            'songName' => $songName,
            'artist' => $artist,
            'price' => $price
        );
        
        $statement = $database->prepare($sql);
		$statement->execute($params);
        
        // Set album for song
        $sql = file_get_contents('sql/insertSongAlbum.sql');
        $statement = $database->prepare($sql);
        
        foreach($song_album as $album) {
            $params = array(
                'songID' => $songID,
                'albumID' => $album
            );
            $statement->execute($params);
        }
    }
    
    elseif ($action == 'edit') {
        $sql = file_get_contents('sql/updateSong.sql');
        $params = array(
            'songID' => $songID,
            'songName' => $songName,
            'artist' => $artist,
            'price' => $price
        );
        
        $statement = $database->prepare($sql);
        $statement->execute($params);
        
        // Remove current album info
        $sql = file_get_contents('sql/removeAlbum.sql');
        $params = array(
            'songID' => $songID
        );
        
        $statement = $database->prepare($sql);
        $statement->execute($params);
        
        // Set albums for song
        $sql = file_get_contents('sql/insertSongAlbum.sql');
        $statement = $database->prepare($sql);
        
        foreach($song_album as $album) {
            $params = array(
                'songID' => $songID,
                'albumID' => $album
            );
            $statement->execute($params);
        };
    }
    
    // Redirect to song listing page
    header('location: index.php');
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    
    <title>Manage Song</title>
    <meta name="description" content="Gorillaz Store">
    <meta name="author" content="Clay Napier">
    
    <link rel="stylesheet" href="css/style.css">
    
    <!-- [if lt IE 9]>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script>
    <![endif]-->
</head>
<body>
    <div class="box">
        <h1>Manage Song</h1>
        <form action="" method="POST">
            <div class="form-element">
                <label>Song ID:</label>
                <?php if ($action == 'add') : ?>
                    <input type="text" name="songID" class="textbox" value="<?php echo $song['songID'] ?>" />
                <?php endif; ?>
            </div>
            <div class="form-element">
                <label>Song Name:</label>
                <input type="text" name="song-name" class="textbox" value="<?php echo $song['songName'] ?>" />
            </div>
            <div class="form-element">
                <label>Album:</label>
                <?php foreach($albums as $album) : ?>
                    <?php if(in_array($album['albumID'], $song_album)) : ?>
                        <input checked class="radio" type="checkbox" name="album[]" value="<?php echo $album['albumID'] ?>" /><span class="radio-label"><?php echo $album['name'] ?></span><br />
                    <?php else : ?>
                        <input class="radio" type="checkbox" name="album[]" value="<?php echo $album['albumID'] ?>" /><span class="radio-label"><?php echo $album['name'] ?></span><br />
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
            <div class="form-element">
                <label>Artist:</label>
                <input type="text" name="song-artist" class="textbox" value="<?php echo $song['artist'] ?>" />
            </div>
            <div class="form-element">
                <label>Price:</label>
                <input type="number" step="any" name="song-price" class="textbox" value="<?php echo $song['price'] ?>" />
            </div>
            <div class="form-element">
                <input type="submit" class="button" />&nbsp;
                <input type="reset" class="button" />
            </div>
        </form>
    </div>
</body>
</html>