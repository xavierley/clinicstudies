CREATE TABLE tx_xlclinicstudies_domain_model_study (
	title varchar(255) NOT NULL DEFAULT '',
	tx_xlclinicstudies_condition varchar(255) NOT NULL DEFAULT '',
	intervention varchar(255) NOT NULL DEFAULT '',
	location varchar(255) NOT NULL DEFAULT '',
	status smallint(1) unsigned NOT NULL DEFAULT '0',
	studystart int(11) NOT NULL DEFAULT '0',
	summary text NOT NULL DEFAULT '',
	description text NOT NULL DEFAULT '',
	phases int(11) unsigned DEFAULT '0'
);

CREATE TABLE tx_xlclinicstudies_domain_model_phase (
	title varchar(255) NOT NULL DEFAULT ''
);
