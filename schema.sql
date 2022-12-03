DROP DATABASE IF EXISTS `dolphin_crm`;
CREATE DATABASE `dolphin_crm`;
USE `dolphin_crm`;

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` char(35) NOT NULL default '',
  `lastname` char(35) NOT NULL default '',
  `password` char(20) NOT NULL default '',
  `email` char(35) NOT NULL default '',
  `role` char(20) NOT NULL default '',
  `created_at` date NOT NULL,
  PRIMARY KEY  (`id`)
);

DROP TABLE IF EXISTS `contacts`;
CREATE TABLE `contacts` (
 `id` int(11) NOT NULL auto_increment,
 'title' varchar(5)  NOT NULL default ''
  `firstname` varchar(20) NOT NULL default '',
  `lastname` varchar(20) NOT NULL default '',
  `email` varchar(20) NOT NULL default '',
  `telephone` varchar(11) NOT NULL default '0',
  'company' varchar(35)  NOT NULL default ''
  PRIMARY KEY  (`id`)
)

DROP TABLE IF EXISTS `notes`;
CREATE TABLE `notes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `contact_id` int(10) NOT NULL default '',
  `comment` text(100) NOT NULL default '',
  `created_by` int(20) NOT NULL,
  `created_at` date NOT NULL,
  PRIMARY KEY  (`id`)
)