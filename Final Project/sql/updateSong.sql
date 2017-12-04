UPDATE songs
SET `songID` = ':songID', `songName` = ':songName', `artist` = ':artist', `price` = ':price'
WHERE `songID` = ':songID'