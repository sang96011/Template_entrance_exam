-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema Eleanning
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema Eleanning
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `Eleanning` DEFAULT CHARACTER SET utf8 ;
USE `Eleanning` ;

-- -----------------------------------------------------
-- Table `Eleanning`.`Subjects`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Eleanning`.`Subjects` (
  `idSubjects` INT NOT NULL,
  `subject` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idSubjects`),
  UNIQUE INDEX `idSubjects_UNIQUE` (`idSubjects` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Eleanning`.`Questions`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Eleanning`.`Questions` (
  `idQuestions` INT NOT NULL,
  `Content` NVARCHAR(1000) NOT NULL,
  `level` INT NOT NULL,
  `idSubject` INT NOT NULL,
  PRIMARY KEY (`idQuestions`, `idSubject`),
  UNIQUE INDEX `idQuestions_UNIQUE` (`idQuestions` ASC),
  INDEX `fk_Questions_Subjects_idx` (`idSubject` ASC),
  CONSTRAINT `fk_Questions_Subjects`
    FOREIGN KEY (`idSubject`)
    REFERENCES `Eleanning`.`Subjects` (`idSubjects`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Eleanning`.`Answers`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Eleanning`.`Answers` (
  `idAnswers` INT NOT NULL,
  `answer` NVARCHAR(255) NOT NULL,
  `idQuestion` INT NOT NULL,
  PRIMARY KEY (`idAnswers`, `idQuestion`),
  UNIQUE INDEX `idAnswers_UNIQUE` (`idAnswers` ASC),
  INDEX `fk_Answers_Questions1_idx` (`idQuestion` ASC),
  CONSTRAINT `fk_Answers_Questions1`
    FOREIGN KEY (`idQuestion`)
    REFERENCES `Eleanning`.`Questions` (`idQuestions`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Eleanning`.`ContestsAgo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Eleanning`.`ContestsAgo` (
  `idContestsAgo` INT NOT NULL,
  `file` NVARCHAR(255) NOT NULL,
  `idSubjects` INT NOT NULL,
  PRIMARY KEY (`idContestsAgo`, `idSubjects`),
  INDEX `fk_ContestsAgo_Subjects1_idx` (`idSubjects` ASC),
  CONSTRAINT `fk_ContestsAgo_Subjects1`
    FOREIGN KEY (`idSubjects`)
    REFERENCES `Eleanning`.`Subjects` (`idSubjects`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Eleanning`.`Videos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Eleanning`.`Videos` (
  `idVideos` INT NOT NULL,
  `link` NVARCHAR(255) NOT NULL,
  `idSubject` INT NOT NULL,
  PRIMARY KEY (`idVideos`, `idSubject`),
  INDEX `fk_Videos_Subjects1_idx` (`idSubject` ASC),
  CONSTRAINT `fk_Videos_Subjects1`
    FOREIGN KEY (`idSubject`)
    REFERENCES `Eleanning`.`Subjects` (`idSubjects`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Eleanning`.`Users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Eleanning`.`Users` (
  `idUsers` INT NOT NULL,
  `name` VARCHAR(45) NOT NULL,
  `username` VARCHAR(30) NOT NULL,
  `gender` TINYINT NOT NULL,
  `admin` TINYINT NOT NULL,
  PRIMARY KEY (`idUsers`))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
