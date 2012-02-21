DROP TABLE IF EXISTS wcf1_partner;
CREATE TABLE wcf1_partner (
	partnerID int(10) unsigned NOT NULL auto_increment,
	name varchar(255) NOT NULL DEFAULT '',
	image varchar(255) NOT NULL DEFAULT '',
	link varchar(255) NOT NULL DEFAULT '',
	description mediumtext,
	showOrder int(10) UNSIGNED NOT NULL DEFAULT 0,
	pubDate int(10) unsigned NOT NULL DEFAULT 0,
	disabled tinyint(1) unsigned NOT NULL DEFAULT 0,
	PRIMARY KEY (partnerID)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS wcf1_linkus;
CREATE TABLE wcf1_linkus (
	linkusID int(10) unsigned NOT NULL auto_increment,
	name varchar(255) NOT NULL DEFAULT '',
	image varchar(255) NOT NULL DEFAULT '',
	link varchar(255) NOT NULL DEFAULT '',
	description mediumtext,
	showOrder int(10) UNSIGNED NOT NULL DEFAULT 0,
	pubDate int(10) unsigned NOT NULL DEFAULT 0,
	disabled tinyint(1) unsigned NOT NULL DEFAULT 0,
	PRIMARY KEY (linkusID)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;