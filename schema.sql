-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema Elearning
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema Elearning
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `Elearning` DEFAULT CHARACTER SET utf8 ;
USE `Elearning` ;

-- -----------------------------------------------------
-- Table `Elearning`.`Subjects`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Elearning`.`Subjects` (
  `idSubject` INT NOT NULL,
  `subject` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idSubject`),
  UNIQUE INDEX `idSubjects_UNIQUE` (`idSubject` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Elearning`.`Questions`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Elearning`.`Questions` (
  `idQuestion` INT NOT NULL,
  `Content` NVARCHAR(1000) NOT NULL,
  `level` TINYINT NOT NULL,
  `idSubject` INT NOT NULL,
  PRIMARY KEY (`idQuestion`, `idSubject`),
  UNIQUE INDEX `idQuestions_UNIQUE` (`idQuestion` ASC),
  INDEX `fk_Questions_Subjects_idx` (`idSubject` ASC),
  CONSTRAINT `fk_Questions_Subjects`
    FOREIGN KEY (`idSubject`)
    REFERENCES `Elearning`.`Subjects` (`idSubject`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Elearning`.`Answers`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Elearning`.`Answers` (
  `idAnswer` INT NOT NULL,
  `answer` NVARCHAR(255) NOT NULL,
  `idQuestion` INT NOT NULL,
  PRIMARY KEY (`idAnswer`, `idQuestion`),
  UNIQUE INDEX `idAnswers_UNIQUE` (`idAnswer` ASC),
  INDEX `fk_Answers_Questions1_idx` (`idQuestion` ASC),
  CONSTRAINT `fk_Answers_Questions1`
    FOREIGN KEY (`idQuestion`)
    REFERENCES `Elearning`.`Questions` (`idQuestion`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Elearning`.`ContestsAgo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Elearning`.`ContestsAgo` (
  `idContestsAgo` INT NOT NULL,
  `file` NVARCHAR(255) NOT NULL,
  `idSubjects` INT NOT NULL,
  PRIMARY KEY (`idContestsAgo`, `idSubjects`),
  INDEX `fk_ContestsAgo_Subjects1_idx` (`idSubjects` ASC),
  CONSTRAINT `fk_ContestsAgo_Subjects1`
    FOREIGN KEY (`idSubjects`)
    REFERENCES `Elearning`.`Subjects` (`idSubject`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Elearning`.`Videos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Elearning`.`Videos` (
  `idVideo` INT NOT NULL,
  `link` NVARCHAR(255) NOT NULL,
  `idSubject` INT NOT NULL,
  PRIMARY KEY (`idVideo`, `idSubject`),
  INDEX `fk_Videos_Subjects1_idx` (`idSubject` ASC),
  CONSTRAINT `fk_Videos_Subjects1`
    FOREIGN KEY (`idSubject`)
    REFERENCES `Elearning`.`Subjects` (`idSubject`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Elearning`.`Users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Elearning`.`Users` (
  `idUser` INT NOT NULL,
  `name` VARCHAR(45) NOT NULL,
  `username` VARCHAR(30) NOT NULL,
  `gender` TINYINT NOT NULL,
  `admin` TINYINT NOT NULL,
  PRIMARY KEY (`idUser`))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
