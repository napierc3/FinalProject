SELECT *
FROM song_album
JOIN albums on song_album.categoryID = albums.albumID
WHERE `albumID` = ':albumID'