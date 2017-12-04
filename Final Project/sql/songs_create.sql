CREATE TABLE IF NOT EXISTS `songs` (
  `songID` INT NOT NULL AUTO_INCREMENT,
  `songName` VARCHAR(45) NULL,
  `artist` VARCHAR(45) NULL,
  `price` float(4,2) NULL,
  PRIMARY KEY (`songID`));
    
INSERT INTO `songs` (`songName`, `artist`, `price`) VALUES ('Momentz', 'Gorillaz ft. De La Soul', '1.00');
INSERT INTO `songs` (`songName`, `artist`, `price`) VALUES ('Saturnz Barz', 'Gorillaz ft. Popcaan', '1.00');
INSERT INTO `songs` (`songName`, `artist`, `price`) VALUES ('Sound Check (Gravity)', 'Gorillaz', '1.00');
INSERT INTO `songs` (`songName`, `artist`, `price`) VALUES ('19-2000', 'Gorillaz', '1.00');
INSERT INTO `songs` (`songName`, `artist`, `price`) VALUES ('Feel Good Inc.', 'Gorillaz ft. De La Soul', '1.00');
INSERT INTO `songs` (`songName`, `artist`, `price`) VALUES ('White Light', 'Gorillaz', '1.00');
INSERT INTO `songs` (`songName`, `artist`, `price`) VALUES ('On Melancholy Hill', 'Gorillaz', '1.00');
INSERT INTO `songs` (`songName`, `artist`, `price`) VALUES ('Some Kind of Nature', 'Gorillaz ft. Lou Reed', '1.00');
