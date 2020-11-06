-- CREATE TABLE "#__user_profiles_extended" -----------------
CREATE TABLE IF NOT EXISTS `#__user_profiles_extended` (
	`id` Int( 11 ) AUTO_INCREMENT NOT NULL,
	`user_id` Int( 11 ) UNSIGNED NOT NULL,
	`key` VarChar( 50 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`value` Text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`seckey` VarChar( 11 ) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
	CONSTRAINT `unique_id` UNIQUE( `id` ) )
CHARACTER SET = utf8
COLLATE = utf8_general_ci
ENGINE = InnoDB
AUTO_INCREMENT = 1;
-- -------------------------------------------------------------

-- CREATE INDEX "index_user_id" --------------------------------
CREATE INDEX `index_user_id` USING BTREE ON `#__user_profiles_extended`( `user_id` );
-- -------------------------------------------------------------