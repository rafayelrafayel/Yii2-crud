<?php

namespace app\models;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TableGenerator
 *
 * @author comp
 */
class TableGenerator {
    
    
    private static $_SQL = '
    CREATE TABLE `kunde` (
  `KundenNr` int(11) NOT NULL AUTO_INCREMENT,
  `Anrede` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Vorname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Nachname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Strasse` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `PLS` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Ort` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Telefon` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Werbung` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`KundenNr`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;


insert  into `kunde`(`KundenNr`,`Anrede`,`Vorname`,`Nachname`,`Strasse`,`PLS`,`Ort`,`Telefon`,`Werbung`) values (1,"fhf","Bob","Jones","testasd","testasd","test","asd","asdasd"),(2,"11","John","Smith","testasd","testasd","test","asd","asdasd"),(3,"test12","Emma","Watson","testasd","testasd","test","asd","asdasd");

 CREATE TABLE `produktgruppe` (
  `ProduktgruppeNr` int(11) NOT NULL AUTO_INCREMENT,
  `Produktgruppe` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`ProduktgruppeNr`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

insert  into `produktgruppe`(`ProduktgruppeNr`,`Produktgruppe`) values (1,"group1"),(2,"group2"),(3,"group3");

CREATE TABLE `karte` (
  `KarteNr` int(11) NOT NULL AUTO_INCREMENT,
  `KundenNr` int(11) DEFAULT NULL,
  `Erster_Einkauf` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`KarteNr`),
  KEY `KundenNr` (`KundenNr`),
  CONSTRAINT `karte_ibfk_1` FOREIGN KEY (`KundenNr`) REFERENCES `kunde` (`KundenNr`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

insert  into `karte`(`KarteNr`,`KundenNr`,`Erster_Einkauf`) values (1,1,"Erster Einkauf 1"),(2,2,"Erster Einkauf 2"),(3,3,"Erster Einkauf 3");



CREATE TABLE `verkauf` (
  `VerkaufNr` int(11) NOT NULL AUTO_INCREMENT,
  `KundenNr` int(11) DEFAULT NULL,
  `KarteNr` int(11) DEFAULT NULL,
  `ProduktgruppeNr` int(11) DEFAULT NULL,
  `Betrag` decimal(10,2) DEFAULT NULL,
  `Dataum` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`VerkaufNr`),
  KEY `KarteNr` (`KarteNr`),
  KEY `KundenNr` (`KundenNr`),
  KEY `ProduktgruppeNr` (`ProduktgruppeNr`),
  CONSTRAINT `verkauf_ibfk_3` FOREIGN KEY (`ProduktgruppeNr`) REFERENCES `produktgruppe` (`ProduktgruppeNr`),
  CONSTRAINT `verkauf_ibfk_1` FOREIGN KEY (`KarteNr`) REFERENCES `karte` (`KarteNr`),
  CONSTRAINT `verkauf_ibfk_2` FOREIGN KEY (`KundenNr`) REFERENCES `kunde` (`KundenNr`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci



';

    
    public static function generate() {
        
        \Yii::$app->db->createCommand(self::$_SQL)->execute();
        
    }

}
