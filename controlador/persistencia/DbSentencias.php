<?php

interface DbSentencias {

    //Persona
    const INSERTAR_PERSONA = "INSERT INTO `spring`.`main_person` (`person_name`, `person_surname`, `person_birthdate`, `person_sex`, `person_province_id`) VALUES (?,?,?,?,?);";
    const ELIMINAR_PERSONA = "DELETE FROM `spring`.`main_person` WHERE `person_id` = ?;";
    const ACTUALIZAR_PERSONA = "UPDATE `spring`.`main_person` SET `person_name` = ?, `person_surname` = ?, `person_birthdate` = ?, `person_sex` = ?, `person_province_id` = ? WHERE `person_id` = ?;";
    const LISTAR_PERSONAS = "SELECT `main_person`.`person_id`, `main_person`.`person_name`, `main_person`.`person_surname`, DATE_FORMAT(`main_person`.`person_birthdate`,'%d/%m/%Y') AS `person_birthdate`, REPLACE((REPLACE(`main_person`.`person_sex`, 'M', 'Masculino')),'F','Femenino') AS `person_sex`, `main_province`.`province_name`, `main_province`.`province_id` FROM `spring`.`main_person` INNER JOIN `spring`.`main_province` ON (`main_person`.`person_province_id` = `main_province`.`province_id`);";
    const LISTAR_PERSONA = "SELECT `main_person`.`person_id`,`main_person`.`person_name`, `main_person`.`person_surname`, DATE_FORMAT(`main_person`.`person_birthdate`,'%d/%m/%Y') AS person_birthdate, REPLACE((REPLACE(`main_person`.`person_sex`, 'M', 'Masculino')),'F','Femenino') AS person_sex, `main_province`.`province_name`, `main_province`.`province_id` FROM `spring`.`main_person` INNER JOIN `spring`.`main_province` ON (`main_person`.`person_province_id` = `main_province`.`province_id`) WHERE `main_person`.`person_id` = ?;";
    
    //Provincia
    const LISTAR_PROVINCIAS = "SELECT `main_province`.`province_id` AS `id`, `main_province`.`province_name` AS `name` FROM `spring`.main_province;";    
    const LISTAR_PROVINCIA = "SELECT `main_province`.`province_id` AS `id`, `main_province`.`province_name` AS `name` FROM `spring`.main_province WHERE province_id = ?;";
    const ELIMINAR_PROVINCIA = "DELETE FROM `spring`.`main_province` WHERE `province_id` = ?;";
    const INSERTAR_PROVINCIA = "INSERT INTO `spring`.`main_province` (`province_name`) VALUES (?);";
    const ACTUALIZAR_PROVINCIA = "UPDATE `spring`.`main_province` SET `province_name` = ? WHERE province_id = ?;";
}