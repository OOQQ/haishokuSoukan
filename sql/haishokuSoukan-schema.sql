-- no te olvides de desactivar la casilla de "Enable foreign key checks" cuando importes la bbdd (al lado del boton Go)!!

DROP SCHEMA IF EXISTS haishokuSoukan;
CREATE SCHEMA haishokuSoukan CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE haishokuSoukan;

SET FOREIGN_KEY_CHECKS = 0;
CREATE TABLE IF NOT EXISTS color (
		id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
		user_id INT NOT NULL,
				CONSTRAINT `fk_color_user_id`
						FOREIGN KEY (user_id)
						REFERENCES user (id)
								ON DELETE CASCADE
								ON UPDATE CASCADE,
		colorName varchar(32) UNIQUE NOT NULL,
		hexa varchar(7) UNIQUE NOT NULL,
		colorDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)ENGINE = InnoDB DEFAULT CHARSET = utf8;

CREATE TABLE IF NOT EXISTS colorCombination (
		id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
		combinationName varchar(32) UNIQUE NOT NULL,
		user_id INT NOT NULL,
				CONSTRAINT `fk_colorCombination_user_id`
						FOREIGN KEY (user_id)
						REFERENCES user (id)
								ON DELETE CASCADE
								ON UPDATE CASCADE,
		colorA INT NOT NULL,
				CONSTRAINT `fk_colorCombination_colorA_color_id`
						FOREIGN KEY (colorA)
						REFERENCES color (id)
								ON DELETE CASCADE
								ON UPDATE CASCADE,
		colorB INT NOT NULL,
				CONSTRAINT `fk_colorCombination_colorB_color_id`
						FOREIGN KEY (colorB)
						REFERENCES color (id)
								ON DELETE CASCADE
								ON UPDATE CASCADE,
		colorC INT,
				CONSTRAINT `fk_colorCombination_colorC_color_id`
						FOREIGN KEY (colorC)
						REFERENCES color (id)
								ON DELETE CASCADE
								ON UPDATE CASCADE,
		colorD INT,
				CONSTRAINT `fk_colorCombination_colorD_color_id`
						FOREIGN KEY (colorD)
						REFERENCES color (id)
								ON DELETE CASCADE
								ON UPDATE CASCADE,
		combinationDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)ENGINE = InnoDB DEFAULT CHARSET = utf8;

CREATE TABLE IF NOT EXISTS user (
		id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
		userName VARCHAR(32) NOT NULL UNIQUE,
		userEmail VARCHAR(64) NOT NULL UNIQUE,
		userDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
		userPass VARCHAR(255) NOT NULL,
		premium BOOLEAN
)ENGINE = InnoDB DEFAULT CHARSET = utf8;

CREATE TABLE IF NOT EXISTS comment (
		id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
		user_id INT NOT NULL,
				CONSTRAINT `fk_comment_user_id`
						FOREIGN KEY (user_id)
						REFERENCES user (id)
								ON DELETE CASCADE
								ON UPDATE CASCADE,
		color_id INT,
				CONSTRAINT `fk_cruzada_color_id`
						FOREIGN KEY (color_id)
						REFERENCES color (id)
								ON DELETE CASCADE
								ON UPDATE CASCADE,
		colorCombination_id INT,
				CONSTRAINT `fk_cruzada_colorCombination_idColorCombination`
						FOREIGN KEY (colorCombination_id)
						REFERENCES colorCombination (id)
								ON DELETE CASCADE
								ON UPDATE CASCADE,
		comment VARCHAR(512) NOT NULL,
		commentDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)ENGINE = InnoDB DEFAULT CHARSET = utf8;
SET FOREIGN_KEY_CHECKS = 1;

CREATE OR REPLACE VIEW viewCombination AS SELECT
 	colorCombination.user_id AS userId,
	combinationName AS name,
	colorAlias1.colorName AS nomA,
	colorAlias1.hexa AS hexA,
	colorAlias2.colorName AS nomB,
	colorAlias2.hexa AS hexB,
	colorAlias3.colorName AS nomC,
	colorAlias3.hexa AS hexC,
	colorAlias4.colorName AS nomD,
	colorAlias4.hexa AS hexD
FROM haishokuSoukan.colorCombination
	LEFT JOIN haishokuSoukan.color AS colorAlias1 ON colorAlias1.id = colorCombination.colorA
	LEFT JOIN haishokuSoukan.color AS colorAlias2 ON colorAlias2.id = colorCombination.colorB
	LEFT JOIN haishokuSoukan.color AS colorAlias3 ON colorAlias3.id = colorCombination.colorC
	LEFT JOIN haishokuSoukan.color AS colorAlias4 ON colorAlias4.id = colorCombination.colorD;
