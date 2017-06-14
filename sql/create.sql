-- --------------------------------------------
-- author: Dominik Falkner
-- Basic Domain Model for scr_forum
-- --------------------------------------------

-- Create Schema
DROP SCHEMA IF EXISTS `scr_forum`;
CREATE SCHEMA `scr_forum`;

USE `scr_forum`;

-- --------------------------------------------
-- Create Tables
-- --------------------------------------------

CREATE TABLE `user` (
	`id` int AUTO_INCREMENT PRIMARY KEY,
	`username` VARCHAR(50) NOT NULL,
	`password_hash` CHAR(60) NOT NULL
);


CREATE TABLE `discussion` (
	`id` int AUTO_INCREMENT PRIMARY KEY,
	`creator_id` int,        -- FK to a user
	`name` VARCHAR(255) NOT NULL,
	`creation_date` DATETIME NOT NULL
);

CREATE TABLE `post` (
	`id` int AUTO_INCREMENT PRIMARY KEY,
	`discussion_id` int NOT NULL, -- FK to a discussion 
	`creator_id` int,             -- FK to a user
	`creation_date` DATETIME NOT NULL,
	`text` TEXT NOT NULL
);

-- --------------------------------------------
-- Create FK Constraints
-- --------------------------------------------
ALTER TABLE `discussion`
	ADD FOREIGN KEY (creator_id) REFERENCES user(id) ON DELETE SET NULL;
	
ALTER TABLE `post`
	ADD FOREIGN KEY (creator_id) REFERENCES `user`(id) ON DELETE SET NULL;
ALTER TABLE `post`
	ADD FOREIGN KEY (discussion_id) REFERENCES `discussion`(id) ON DELETE CASCADE;