SELECT song_album.songID, albums.albumID, albums.name
FROM song_album
JOIN albums on song_album.categoryID = albums.albumID;