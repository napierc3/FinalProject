CREATE TABLE IF NOT EXISTS `albums` (
	`albumID` INT NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(45) NULL,
    PRIMARY KEY (`albumID`));
    
INSERT INTO `albums` (`name`) VALUES ('Gorillaz');
INSERT INTO `albums` (`name`) VALUES ('Demon Days');
INSERT INTO `albums` (`name`) VALUES ('Plastic Beach');
INSERT INTO `albums` (`name`) VALUES ('Humanz');

CREATE TABLE `song_album` (
  `songID` VARCHAR(45) NOT NULL,
  `categoryID` INT NULL
);