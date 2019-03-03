-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema db_tax
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `db_tax` ;

-- -----------------------------------------------------
-- Schema db_tax
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `db_tax` DEFAULT CHARACTER SET utf8 ;
USE `db_tax` ;

-- -----------------------------------------------------
-- Table `db_tax`.`tax`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_tax`.`tax` ;

CREATE TABLE IF NOT EXISTS `db_tax`.`tax` (
  `id_tax` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NULL,
  `card_tax` VARCHAR(16) NULL,
  `address` TEXT NULL,
  `number` VARCHAR(16) NULL,
  `tax_type` VARCHAR(8) NULL,
  `total_charactor` VARCHAR(45) NULL,
  `pay_type` VARCHAR(8) NULL,
  `signal_name` VARCHAR(45) NULL,
  `date_add` DATETIME NOT NULL,
  `date_upd` DATETIME NOT NULL,
  PRIMARY KEY (`id_tax`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_tax`.`tax_detail`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_tax`.`tax_detail` ;

CREATE TABLE IF NOT EXISTS `db_tax`.`tax_detail` (
  `id_tax_detail` INT NOT NULL AUTO_INCREMENT,
  `id_tax` INT NOT NULL,
  `code_tax` VARCHAR(8) NULL,
  `pay_date` DATE NULL,
  `pay_total` FLOAT NULL,
  `pay_tax` FLOAT NULL,
  PRIMARY KEY (`id_tax_detail`),
  INDEX `fk_tax_detail_tax_idx` (`id_tax` ASC),
  CONSTRAINT `fk_tax_detail_tax`
    FOREIGN KEY (`id_tax`)
    REFERENCES `db_tax`.`tax` (`id_tax`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
