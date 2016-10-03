-- MySQL Workbench Synchronization
-- Generated: 2016-10-01 21:32
-- Model: New Model
-- Version: 1.0
-- Project: Name of the project
-- Author: Irina

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `AdministrationDB` DEFAULT CHARACTER SET utf8 COLLATE utf8_slovak_ci ;

CREATE TABLE IF NOT EXISTS `AdministrationDB`.`Cars` (
  `idCars` INT(11) NOT NULL AUTO_INCREMENT,
  `make` VARCHAR(45) NOT NULL DEFAULT 'Unknown',
  `model` VARCHAR(45) NOT NULL DEFAULT 'Unknown',
  `year` YEAR NULL DEFAULT NULL,
  `VIN` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`idCars`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_slovak_ci;

CREATE TABLE IF NOT EXISTS `AdministrationDB`.`Clients` (
  `idClients` INT(11) NOT NULL AUTO_INCREMENT,
  `First_name` VARCHAR(45) NOT NULL,
  `Last_name` VARCHAR(45) NOT NULL,
  `Pate_of_birth` VARCHAR(45) NULL DEFAULT NULL,
  `Address` VARCHAR(45) NULL DEFAULT NULL,
  `Phone` VARCHAR(45) NULL DEFAULT NULL,
  `Email` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`idClients`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_slovak_ci;

CREATE TABLE IF NOT EXISTS `AdministrationDB`.`Orders` (
  `idOrder` INT(11) NOT NULL AUTO_INCREMENT,
  `Amaunt` VARCHAR(45) NOT NULL,
  `Status` ENUM('Completed', 'In Progress', 'Cancelled') NOT NULL DEFAULT 'Completed',
  `id_car` INT(11) NOT NULL,
  `id_client` INT(11) NOT NULL,
  PRIMARY KEY (`idOrder`),
  INDEX `id_carFK_idx` (`id_car` ASC),
  INDEX `id_client_idx` (`id_client` ASC),
  CONSTRAINT `fkid_car`
    FOREIGN KEY (`id_car`)
    REFERENCES `AdministrationDB`.`Cars` (`idCars`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fkid_client`
    FOREIGN KEY (`id_client`)
    REFERENCES `AdministrationDB`.`Clients` (`idClients`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_slovak_ci;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
  