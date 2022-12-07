DROP DATABASE IF EXISTS dolphin_crm;
CREATE DATABASE dolphin_crm;
USE dolphin_crm;

DROP TABLE IF EXISTS `Users`;
CREATE TABLE `Users` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `firstname` char(35) NOT NULL DEFAULT '',
  `lastname` char(35) NOT NULL DEFAULT '',
  `password` char(20) NOT NULL DEFAULT '',
  `email` char(35) NOT NULL DEFAULT '',
  `role` char(20) NOT NULL DEFAULT '',
  `created_at` DATE DEFAULT NOW()
) ENGINE=MyISAM AUTO_INCREMENT=4080 DEFAULT CHARSET=utf8mb4; 

INSERT INTO Users (firstname, lastname, email, password, role) VALUES ('main', 'admin','admin2@project.com','kmtOUB1KmJJq.', 'admin');

DROP TABLE IF EXISTS `Contacts`;
CREATE TABLE `Contacts` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `assigned_to` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` DATE DEFAULT NOW(),
  `updated_at` DATE DEFAULT NOW(),
  `title` varchar(35) NOT NULL DEFAULT '',
  `firstname` varchar(20) NOT NULL DEFAULT '',
  `lastname` varchar(20) NOT NULL DEFAULT '',
  `email` varchar(20) NOT NULL DEFAULT '',
  `telephone` varchar(11) NOT NULL DEFAULT '0',
  `type` char(20) NOT NULL DEFAULT '',
  `company` varchar(35) NOT NULL DEFAULT ''
) ENGINE=MyISAM AUTO_INCREMENT=4080 DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `Notes`;
CREATE TABLE `Notes` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `contact_id` int(10) NOT NULL DEFAULT 0,
  `comment` text(100) NOT NULL DEFAULT '',
  `created_by` int(20) NOT NULL DEFAULT 0,
  `created_at` DATE DEFAULT NOW()
)ENGINE=MyISAM AUTO_INCREMENT=4080 DEFAULT CHARSET=utf8mb4;

GRANT SELECT, INSERT, UPDATE, DELETE, CREATE, DROP, INDEX, ALTER ON project.* 'admin@project2.com' IDENTIFIED BY 'password123'