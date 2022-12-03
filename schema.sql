DROP DATABASE IF EXISTS dolphin_crm;
CREATE DATABASE dolphin_crm;
USE dolphin_crm;

DROP TABLE IF EXISTS `Users`;
CREATE TABLE `Users` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `firstname` char(35) NOT NULL default '',
  `lastname` char(35) NOT NULL default '',
  `password` char(20) NOT NULL default '',
  `email` char(35) NOT NULL default '',
  `role` char(20) NOT NULL default '',
  `created_at` DATE DEFAULT NOW()
) ENGINE=MyISAM AUTO_INCREMENT=4080 DEFAULT CHARSET=utf8mb4; 

DROP TABLE IF EXISTS `Contacts`;
CREATE TABLE `Contacts` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
 `title` varchar(5) NOT NULL default '',
  `firstname` varchar(20) NOT NULL default '',
  `lastname` varchar(20) NOT NULL default '',
  `email` varchar(20) NOT NULL default '',
  `telephone` varchar(11) NOT NULL default '0',
  `company` varchar(35) NOT NULL default ''
) ENGINE=MyISAM AUTO_INCREMENT=4080 DEFAULT CHARSET=utf8mb4;

DROP TABLE IF EXISTS `Notes`;
CREATE TABLE `Notes` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `contact_id` int(10) NOT NULL default 0,
  `comment` text(100) NOT NULL default '',
  `created_by` int(20) NOT NULL default 0,
  `created_at` DATE DEFAULT NOW()
)ENGINE=MyISAM AUTO_INCREMENT=4080 DEFAULT CHARSET=utf8mb4;

-- GRANT SELECT, INSERT, UPDATE, DELETE, CREATE, DROP, INDEX, ALTER ON project.* 'admin@project2.com' IDENTIFIED BY 'password123'