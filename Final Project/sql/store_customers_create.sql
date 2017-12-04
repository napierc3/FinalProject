CREATE TABLE `store_customers` (
  `customerID` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NULL,
  `username` VARCHAR(45) NULL,
  `password` VARCHAR(45) NULL,
  PRIMARY KEY (`customerID`));
    
INSERT INTO `store_customers` (`name`, `username`, `password`) VALUES ('admin', 'admin', 'password7');
INSERT INTO `store_customers` (`name`, `username`, `password`) VALUES ('Clay Napier', 'napierc3', 'secretpassword');