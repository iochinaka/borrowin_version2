<?php
/**
 *
 */
class  EsquemaBorrowin
{
  public static function getEsquema(){

  return $esquema = "CREATE SCHEMA IF NOT EXISTS `borrowin_db` DEFAULT CHARACTER SET utf8mb4 ;
      USE `borrowin_db`";
    }
  public static function getTablas(){

  return $tablas = "-- MySQL Workbench Forward Engineering

    SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
    SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
    SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

    -- -----------------------------------------------------
    -- Schema mydb
    -- -----------------------------------------------------
    -- -----------------------------------------------------
    -- Schema borrowin_db
    -- -----------------------------------------------------

    -- -----------------------------------------------------
    -- Schema borrowin_db
    -- -----------------------------------------------------
    -- -----------------------------------------------------
    -- Table `borrowin_db`.`usuarios`
    -- -----------------------------------------------------
    DROP TABLE IF EXISTS `borrowin_db`.`usuarios` ;

    CREATE TABLE IF NOT EXISTS `borrowin_db`.`usuarios` (
      `userId` INT(11) NOT NULL AUTO_INCREMENT,
      `email` VARCHAR(30) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL,
      `password` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL,
      PRIMARY KEY (`userId`),
      UNIQUE INDEX `email_UNIQUE` (`email` ASC))
    ENGINE = InnoDB
    AUTO_INCREMENT = 2
    DEFAULT CHARACTER SET = utf8
    COLLATE = utf8_unicode_ci;


    -- -----------------------------------------------------
    -- Table `borrowin_db`.`usuarioperfil`
    -- -----------------------------------------------------
    DROP TABLE IF EXISTS `borrowin_db`.`usuarioperfil` ;

    CREATE TABLE IF NOT EXISTS `borrowin_db`.`usuarioperfil` (
      `perfilId` INT(11) NOT NULL AUTO_INCREMENT,
      `nombre` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL,
      `genero` INT(11) NULL DEFAULT NULL,
      `fechaCumpleano` DATE NULL DEFAULT NULL,
      `locationLat` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL,
      `locationLon` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL,
      `about` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL,
      `userPic` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL,
      `seguidos` INT(11) NULL DEFAULT NULL,
      `seguidores` INT(11) NULL DEFAULT NULL,
      `postLikes` INT(11) NULL DEFAULT NULL,
      `user_perfilId` INT(11) NOT NULL,
      `edad` INT(11) NULL DEFAULT NULL,
      `pais` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL,
      `sessionId` VARCHAR(80) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL,
      PRIMARY KEY (`perfilId`, `user_perfilId`),
      INDEX `fk_usuarioperfil_usuarios1_idx` (`user_perfilId` ASC),
      CONSTRAINT `fk_usuarioperfil_usuarios1`
        FOREIGN KEY (`user_perfilId`)
        REFERENCES `borrowin_db`.`usuarios` (`userId`)
        ON DELETE NO ACTION
        ON UPDATE NO ACTION)
    ENGINE = InnoDB
    AUTO_INCREMENT = 2
    DEFAULT CHARACTER SET = utf8
    COLLATE = utf8_unicode_ci;


    -- -----------------------------------------------------
    -- Table `borrowin_db`.`conversacion`
    -- -----------------------------------------------------
    DROP TABLE IF EXISTS `borrowin_db`.`conversacion` ;

    CREATE TABLE IF NOT EXISTS `borrowin_db`.`conversacion` (
      `usuarioperfil_usuarios_objectId` INT(11) NOT NULL,
      `objectId` INT(11) NOT NULL,
      PRIMARY KEY (`usuarioperfil_usuarios_objectId`, `objectId`),
      CONSTRAINT `fk_conversacion_usuarioperfil1`
        FOREIGN KEY (`usuarioperfil_usuarios_objectId`)
        REFERENCES `borrowin_db`.`usuarioperfil` (`user_perfilId`)
        ON DELETE NO ACTION
        ON UPDATE NO ACTION)
    ENGINE = InnoDB
    DEFAULT CHARACTER SET = utf8
    COLLATE = utf8_unicode_ci;


    -- -----------------------------------------------------
    -- Table `borrowin_db`.`estadoproducto`
    -- -----------------------------------------------------
    DROP TABLE IF EXISTS `borrowin_db`.`estadoproducto` ;

    CREATE TABLE IF NOT EXISTS `borrowin_db`.`estadoproducto` (
      `estadoproductoid` INT(11) NOT NULL AUTO_INCREMENT,
      `estproduc` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL,
      PRIMARY KEY (`estadoproductoid`))
    ENGINE = InnoDB
    DEFAULT CHARACTER SET = utf8
    COLLATE = utf8_unicode_ci;


    -- -----------------------------------------------------
    -- Table `borrowin_db`.`estadotransaccion`
    -- -----------------------------------------------------
    DROP TABLE IF EXISTS `borrowin_db`.`estadotransaccion` ;

    CREATE TABLE IF NOT EXISTS `borrowin_db`.`estadotransaccion` (
      `estadotransaccionid` INT(11) NOT NULL AUTO_INCREMENT,
      `estransac` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL,
      PRIMARY KEY (`estadotransaccionid`))
    ENGINE = InnoDB
    DEFAULT CHARACTER SET = utf8
    COLLATE = utf8_unicode_ci;


    -- -----------------------------------------------------
    -- Table `borrowin_db`.`post`
    -- -----------------------------------------------------
    DROP TABLE IF EXISTS `borrowin_db`.`post` ;

    CREATE TABLE IF NOT EXISTS `borrowin_db`.`post` (
      `objectId` INT(11) NOT NULL AUTO_INCREMENT,
      `text` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL,
      `likesCant` INT(11) NULL DEFAULT NULL,
      `comentariosCant` INT(11) NULL DEFAULT NULL,
      `UsuarioPerfil_objectId` INT(11) NOT NULL,
      PRIMARY KEY (`objectId`, `UsuarioPerfil_objectId`),
      INDEX `fk_Post_UsuarioPerfil1_idx` (`UsuarioPerfil_objectId` ASC),
      CONSTRAINT `fk_Post_UsuarioPerfil1`
        FOREIGN KEY (`UsuarioPerfil_objectId`)
        REFERENCES `borrowin_db`.`usuarioperfil` (`perfilId`)
        ON DELETE NO ACTION
        ON UPDATE NO ACTION)
    ENGINE = InnoDB
    DEFAULT CHARACTER SET = utf8
    COLLATE = utf8_unicode_ci;


    -- -----------------------------------------------------
    -- Table `borrowin_db`.`imagenes`
    -- -----------------------------------------------------
    DROP TABLE IF EXISTS `borrowin_db`.`imagenes` ;

    CREATE TABLE IF NOT EXISTS `borrowin_db`.`imagenes` (
      `objectId` INT(11) NOT NULL AUTO_INCREMENT,
      `imagen` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL,
      `post_objectId` INT(11) NOT NULL,
      `usuarioperfil_objectId` INT(11) NOT NULL,
      PRIMARY KEY (`objectId`, `post_objectId`, `usuarioperfil_objectId`),
      INDEX `fk_imagenes_post1_idx` (`post_objectId` ASC),
      INDEX `fk_imagenes_usuarioperfil1_idx` (`usuarioperfil_objectId` ASC),
      CONSTRAINT `fk_imagenes_post1`
        FOREIGN KEY (`post_objectId`)
        REFERENCES `borrowin_db`.`post` (`objectId`)
        ON DELETE NO ACTION
        ON UPDATE NO ACTION,
      CONSTRAINT `fk_imagenes_usuarioperfil1`
        FOREIGN KEY (`usuarioperfil_objectId`)
        REFERENCES `borrowin_db`.`usuarioperfil` (`perfilId`)
        ON DELETE NO ACTION
        ON UPDATE NO ACTION)
    ENGINE = InnoDB
    DEFAULT CHARACTER SET = utf8
    COLLATE = utf8_unicode_ci;


    -- -----------------------------------------------------
    -- Table `borrowin_db`.`mensajes`
    -- -----------------------------------------------------
    DROP TABLE IF EXISTS `borrowin_db`.`mensajes` ;

    CREATE TABLE IF NOT EXISTS `borrowin_db`.`mensajes` (
      `objectId` INT(11) NOT NULL AUTO_INCREMENT,
      `contenido` VARCHAR(65) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL,
      `fechaPost` DATE NOT NULL,
      `conversacion_usuarioperfil_usuarios_objectId` INT(11) NOT NULL,
      `imagenes_objectId` INT(11) NOT NULL,
      PRIMARY KEY (`objectId`, `conversacion_usuarioperfil_usuarios_objectId`, `imagenes_objectId`),
      INDEX `fk_mensajes_conversacion1_idx` (`conversacion_usuarioperfil_usuarios_objectId` ASC),
      INDEX `fk_mensajes_imagenes1_idx` (`imagenes_objectId` ASC),
      CONSTRAINT `fk_mensajes_conversacion1`
        FOREIGN KEY (`conversacion_usuarioperfil_usuarios_objectId`)
        REFERENCES `borrowin_db`.`conversacion` (`usuarioperfil_usuarios_objectId`)
        ON DELETE NO ACTION
        ON UPDATE NO ACTION,
      CONSTRAINT `fk_mensajes_imagenes1`
        FOREIGN KEY (`imagenes_objectId`)
        REFERENCES `borrowin_db`.`imagenes` (`objectId`)
        ON DELETE NO ACTION
        ON UPDATE NO ACTION)
    ENGINE = InnoDB
    DEFAULT CHARACTER SET = utf8
    COLLATE = utf8_unicode_ci;


    -- -----------------------------------------------------
    -- Table `borrowin_db`.`postcomentarios`
    -- -----------------------------------------------------
    DROP TABLE IF EXISTS `borrowin_db`.`postcomentarios` ;

    CREATE TABLE IF NOT EXISTS `borrowin_db`.`postcomentarios` (
      `objectId` INT(11) NOT NULL AUTO_INCREMENT,
      `text` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL,
      `post` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL,
      `UsuarioPerfil_objectId` INT(11) NOT NULL,
      `Post_objectId` INT(11) NOT NULL,
      PRIMARY KEY (`objectId`, `UsuarioPerfil_objectId`, `Post_objectId`),
      INDEX `fk_PostComentarios_UsuarioPerfil1_idx` (`UsuarioPerfil_objectId` ASC),
      INDEX `fk_PostComentarios_Post1_idx` (`Post_objectId` ASC),
      CONSTRAINT `fk_PostComentarios_Post1`
        FOREIGN KEY (`Post_objectId`)
        REFERENCES `borrowin_db`.`post` (`objectId`)
        ON DELETE NO ACTION
        ON UPDATE NO ACTION,
      CONSTRAINT `fk_PostComentarios_UsuarioPerfil1`
        FOREIGN KEY (`UsuarioPerfil_objectId`)
        REFERENCES `borrowin_db`.`usuarioperfil` (`perfilId`)
        ON DELETE NO ACTION
        ON UPDATE NO ACTION)
    ENGINE = InnoDB
    DEFAULT CHARACTER SET = utf8
    COLLATE = utf8_unicode_ci;


    -- -----------------------------------------------------
    -- Table `borrowin_db`.`producto`
    -- -----------------------------------------------------
    DROP TABLE IF EXISTS `borrowin_db`.`producto` ;

    CREATE TABLE IF NOT EXISTS `borrowin_db`.`producto` (
      `productoid` INT(11) NOT NULL AUTO_INCREMENT,
      `nombre` VARCHAR(15) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL,
      `descripcion` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL,
      `usuarioperfil_objectId` INT(11) NOT NULL,
      `estadoproducto_estadoproductoid` INT(11) NOT NULL,
      PRIMARY KEY (`productoid`, `usuarioperfil_objectId`),
      INDEX `fk_producto_usuarioperfil1_idx` (`usuarioperfil_objectId` ASC),
      INDEX `fk_producto_estadoproducto1_idx` (`estadoproducto_estadoproductoid` ASC),
      CONSTRAINT `fk_producto_estadoproducto1`
        FOREIGN KEY (`estadoproducto_estadoproductoid`)
        REFERENCES `borrowin_db`.`estadoproducto` (`estadoproductoid`)
        ON DELETE NO ACTION
        ON UPDATE NO ACTION,
      CONSTRAINT `fk_producto_usuarioperfil1`
        FOREIGN KEY (`usuarioperfil_objectId`)
        REFERENCES `borrowin_db`.`usuarioperfil` (`perfilId`)
        ON DELETE NO ACTION
        ON UPDATE NO ACTION)
    ENGINE = InnoDB
    DEFAULT CHARACTER SET = utf8
    COLLATE = utf8_unicode_ci;


    -- -----------------------------------------------------
    -- Table `borrowin_db`.`transaccion`
    -- -----------------------------------------------------
    DROP TABLE IF EXISTS `borrowin_db`.`transaccion` ;

    CREATE TABLE IF NOT EXISTS `borrowin_db`.`transaccion` (
      `transaccionid` INT(11) NOT NULL AUTO_INCREMENT,
      `fecprestado` DATE NULL DEFAULT NULL,
      `fecdevuelto` DATE NULL DEFAULT NULL,
      `plazo` INT(11) NULL DEFAULT NULL,
      `valoracion` INT(11) NULL DEFAULT NULL,
      `usuarioperfil_objectId` INT(11) NOT NULL,
      PRIMARY KEY (`transaccionid`, `usuarioperfil_objectId`),
      INDEX `fk_transaccion_usuarioperfil1_idx` (`usuarioperfil_objectId` ASC),
      CONSTRAINT `fk_transaccion_usuarioperfil1`
        FOREIGN KEY (`usuarioperfil_objectId`)
        REFERENCES `borrowin_db`.`usuarioperfil` (`perfilId`)
        ON DELETE NO ACTION
        ON UPDATE NO ACTION)
    ENGINE = InnoDB
    DEFAULT CHARACTER SET = utf8
    COLLATE = utf8_unicode_ci;


    -- -----------------------------------------------------
    -- Table `borrowin_db`.`transaccion_has_producto`
    -- -----------------------------------------------------
    DROP TABLE IF EXISTS `borrowin_db`.`transaccion_has_producto` ;

    CREATE TABLE IF NOT EXISTS `borrowin_db`.`transaccion_has_producto` (
      `transaccion_transaccionid` INT(11) NOT NULL,
      `producto_productoid` INT(11) NOT NULL,
      `producto_usuarioperfil_objectId` INT(11) NOT NULL,
      `estadotransaccion_estadotransaccionid` INT(11) NOT NULL,
      PRIMARY KEY (`transaccion_transaccionid`, `producto_productoid`, `producto_usuarioperfil_objectId`),
      INDEX `fk_transaccion_has_producto_producto1_idx` (`producto_productoid` ASC, `producto_usuarioperfil_objectId` ASC),
      INDEX `fk_transaccion_has_producto_transaccion1_idx` (`transaccion_transaccionid` ASC),
      INDEX `fk_transaccion_has_producto_estadotransaccion1_idx` (`estadotransaccion_estadotransaccionid` ASC),
      CONSTRAINT `fk_transaccion_has_producto_estadotransaccion1`
        FOREIGN KEY (`estadotransaccion_estadotransaccionid`)
        REFERENCES `borrowin_db`.`estadotransaccion` (`estadotransaccionid`)
        ON DELETE NO ACTION
        ON UPDATE NO ACTION,
      CONSTRAINT `fk_transaccion_has_producto_producto1`
        FOREIGN KEY (`producto_productoid` , `producto_usuarioperfil_objectId`)
        REFERENCES `borrowin_db`.`producto` (`productoid` , `usuarioperfil_objectId`)
        ON DELETE NO ACTION
        ON UPDATE NO ACTION,
      CONSTRAINT `fk_transaccion_has_producto_transaccion1`
        FOREIGN KEY (`transaccion_transaccionid`)
        REFERENCES `borrowin_db`.`transaccion` (`transaccionid`)
        ON DELETE NO ACTION
        ON UPDATE NO ACTION)
    ENGINE = InnoDB
    DEFAULT CHARACTER SET = utf8
    COLLATE = utf8_unicode_ci;


    -- -----------------------------------------------------
    -- Table `borrowin_db`.`usuarioperfil_has_usuarioperfil`
    -- -----------------------------------------------------
    DROP TABLE IF EXISTS `borrowin_db`.`usuarioperfil_has_usuarioperfil` ;

    CREATE TABLE IF NOT EXISTS `borrowin_db`.`usuarioperfil_has_usuarioperfil` (
      `usuarioperfilId` INT(11) NOT NULL,
      `usuarioperfil` INT(11) NOT NULL,
      PRIMARY KEY (`usuarioperfilId`, `usuarioperfil`),
      INDEX `fk_usuarioperfil_has_usuarioperfil_usuarioperfil2_idx` (`usuarioperfil` ASC),
      INDEX `fk_usuarioperfil_has_usuarioperfil_usuarioperfil1_idx` (`usuarioperfilId` ASC),
      CONSTRAINT `fk_usuarioperfil_has_usuarioperfil_usuarioperfil1`
        FOREIGN KEY (`usuarioperfilId`)
        REFERENCES `borrowin_db`.`usuarioperfil` (`perfilId`)
        ON DELETE NO ACTION
        ON UPDATE NO ACTION,
      CONSTRAINT `fk_usuarioperfil_has_usuarioperfil_usuarioperfil2`
        FOREIGN KEY (`usuarioperfil`)
        REFERENCES `borrowin_db`.`usuarioperfil` (`perfilId`)
        ON DELETE NO ACTION
        ON UPDATE NO ACTION)
    ENGINE = InnoDB
    DEFAULT CHARACTER SET = utf8
    COLLATE = utf8_unicode_ci;


    SET SQL_MODE=@OLD_SQL_MODE;
    SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
    SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
";
}
}


?>
