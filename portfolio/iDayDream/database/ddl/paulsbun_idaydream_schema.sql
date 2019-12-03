-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema idaydream
-- drop schema idaydream;
-- create schema idaydream;
-- -----------------------------------------------------

SET FOREIGN_KEY_CHECKS = 0;

-- -----------------------------------------------------
-- Table ethnicities
-- -----------------------------------------------------
DROP TABLE IF EXISTS ethnicities ;

CREATE TABLE IF NOT EXISTS ethnicities (
  id INT(11) NOT NULL AUTO_INCREMENT,
  code VARCHAR(60) NOT NULL,
  ethnicity VARCHAR(45) NOT NULL,
  sort_order INT(11) NOT NULL,
  created DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  last_updated DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (id),
  UNIQUE INDEX code_UNIQUE (code ASC),
  UNIQUE INDEX ethnicity_UNIQUE (ethnicity ASC),
  UNIQUE INDEX sort_order_unique (sort_order ASC),
  UNIQUE INDEX id_UNIQUE (id ASC))
ENGINE = InnoDB
AUTO_INCREMENT = 1
DEFAULT CHARACTER SET = utf8;

insert into ethnicities (code, ethnicity, sort_order) values ('cd-native','American Indian or Alaska Native', 1);
insert into ethnicities (code, ethnicity, sort_order) values ('cd-asian','Asian or Asian American', 2);
insert into ethnicities (code, ethnicity, sort_order) values ('cd-black','Black or African American', 3);
insert into ethnicities (code, ethnicity, sort_order) values ('cd-hispanic','Hispanic or Latino/a', 4);
insert into ethnicities (code, ethnicity, sort_order) values ('cd-mena','Middle Eastern or MENA', 5);
insert into ethnicities (code, ethnicity, sort_order) values ('cd-islander','Native Hawaiian or Other Pacific Islander', 6);
insert into ethnicities (code, ethnicity, sort_order) values ('cd-seAsian','Southeast Asian', 7);
insert into ethnicities (code, ethnicity, sort_order) values ('cd-white','White non-Hispanic', 8);
insert into ethnicities (code, ethnicity, sort_order) values ('cd-multi','BI/Multiracial', 9);
insert into ethnicities (code, ethnicity, sort_order) values ('cd-other','Other', 10);
insert into ethnicities (code, ethnicity, sort_order) values ('cd-decline','Declined to State', 11);

-- -----------------------------------------------------
-- Table genders
-- -----------------------------------------------------
DROP TABLE IF EXISTS genders ;

CREATE TABLE IF NOT EXISTS genders (
  id INT(11) NOT NULL AUTO_INCREMENT,
  code VARCHAR(60) NOT NULL,
  gender VARCHAR(45) NOT NULL,
  sort_order INT(11) NOT NULL,
  created DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  last_updated DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (id),
  UNIQUE INDEX gender_UNIQUE (gender ASC),
  UNIQUE INDEX code_UNIQUE (code ASC),
  UNIQUE INDEX sort_order_unique (sort_order ASC))
ENGINE = InnoDB
AUTO_INCREMENT = 1
DEFAULT CHARACTER SET = utf8;

insert into genders (code, gender, sort_order) values ('cd-male', 'M', 1);
insert into genders (code, gender, sort_order) values ('cd-female', 'F', 2);
insert into genders (code, gender, sort_order) values ('cd-other', 'Other', 3);
insert into genders (code, gender, sort_order) values ('cd-noSay', 'Prefer not to Say', 4);

-- -----------------------------------------------------
-- Table lead_sources
-- -----------------------------------------------------
DROP TABLE IF EXISTS lead_sources ;

CREATE TABLE IF NOT EXISTS lead_sources (
  id INT(11) NOT NULL AUTO_INCREMENT,
  code VARCHAR(60) NOT NULL,
  lead VARCHAR(45) NOT NULL,
  created DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  last_updated DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (id),
  UNIQUE INDEX id_UNIQUE (id ASC),
  UNIQUE INDEX lead_UNIQUE (lead ASC),
  UNIQUE INDEX code_UNIQUE (code ASC))
ENGINE = InnoDB
AUTO_INCREMENT = 1
DEFAULT CHARACTER SET = utf8;

insert into lead_sources (lead, code) values ('Word of Mouth/Friend/Colleague', 'cd-wordOfMouth');
insert into lead_sources (lead, code) values ('Web/Social Media', 'cd-webSocMedia');
insert into lead_sources (lead, code) values ('Print (Flyer/Poster/Brochure)', 'cd-print');
insert into lead_sources (lead, code) values ('Corporate Sponsor', 'cd-corporateSponsor');
insert into lead_sources (lead, code) values ('Other', 'cd-other');

-- -----------------------------------------------------
-- Table roles
-- -----------------------------------------------------
DROP TABLE IF EXISTS roles ;

CREATE TABLE IF NOT EXISTS roles (
  id INT(11) NOT NULL AUTO_INCREMENT,
  code VARCHAR(60) NOT NULL,
  role VARCHAR(45) NOT NULL,
  sort_order INT(11) NOT NULL,
  created DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  last_updated DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (id),
  UNIQUE INDEX id_UNIQUE (id ASC),
  UNIQUE INDEX role_UNIQUE (role ASC),
  UNIQUE INDEX code_UNIQUE (code ASC),
  UNIQUE INDEX sort_order_unique (sort_order ASC))
ENGINE = InnoDB
AUTO_INCREMENT = 1
DEFAULT CHARACTER SET = utf8;

insert into roles (code, role, sort_order) values ('cd-events', 'Events (College Tours, Community Service)', 1);
insert into roles (code, role, sort_order) values ('cd-fundraising', 'Fundraising', 2);
insert into roles (code, role, sort_order) values ('cd-newsletter', 'Newsletter Production (Monthly)', 3);
insert into roles (code, role, sort_order) values ('cd-coordination', 'Volunteer Coordination', 4);
insert into roles (code, role, sort_order) values ('cd-mentoring', 'Mentoring', 5);
insert into roles (code, role, sort_order) values ('cd-other', 'Other', 6);

-- -----------------------------------------------------
-- Table shirt_sizes
-- -----------------------------------------------------
DROP TABLE IF EXISTS shirt_sizes ;

CREATE TABLE IF NOT EXISTS shirt_sizes (
  id INT(11) NOT NULL AUTO_INCREMENT,
  code VARCHAR(60) NOT NULL,
  size VARCHAR(20) NOT NULL,
  sort_order INT(11) NOT NULL,
  created DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  last_updated DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (id),
  UNIQUE INDEX id_UNIQUE (id ASC),
  UNIQUE INDEX size_UNIQUE (size ASC),
  UNIQUE INDEX sort_order_unique (sort_order ASC))
ENGINE = InnoDB
AUTO_INCREMENT = 1
DEFAULT CHARACTER SET = utf8;

insert into shirt_sizes (size, code, sort_order) values ('Extra Small', 'cd-xs', 1);
insert into shirt_sizes (size, code, sort_order) values ('Small', 'cd-small', 2);
insert into shirt_sizes (size, code, sort_order) values ('Medium', 'cd-med', 3);
insert into shirt_sizes (size, code, sort_order) values ('Large', 'cd-large', 4);
insert into shirt_sizes (size, code, sort_order) values ('Extra Large', 'cd-xl', 5);
insert into shirt_sizes (size, code, sort_order) values ('XXL', 'cd-xxl', 6);

-- -----------------------------------------------------
-- Table states
-- -----------------------------------------------------
DROP TABLE IF EXISTS states ;

CREATE TABLE IF NOT EXISTS states (
  code CHAR(2) NOT NULL,
  name VARCHAR(45) NOT NULL,
  created DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  last_updated DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (code),
  UNIQUE INDEX name_UNIQUE (name ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

insert into states (code, name) values ('AL','Alabama');
insert into states (code, name) values ('AK','Alaska');
insert into states (code, name) values ('AZ','Arizona');
insert into states (code, name) values ('AR','Arkansas');
insert into states (code, name) values ('CA','California');
insert into states (code, name) values ('CO','Colorado');
insert into states (code, name) values ('CT','Connecticut');
insert into states (code, name) values ('DE','Delaware');
insert into states (code, name) values ('DC','District Of Columbia');
insert into states (code, name) values ('FL','Florida');
insert into states (code, name) values ('GA','Georgia');
insert into states (code, name) values ('HI','Hawaii');
insert into states (code, name) values ('ID','Idaho');
insert into states (code, name) values ('IL','Illinois');
insert into states (code, name) values ('IN','Indiana');
insert into states (code, name) values ('IA','Iowa');
insert into states (code, name) values ('KS','Kansas');
insert into states (code, name) values ('KY','Kentucky');
insert into states (code, name) values ('LA','Louisiana');
insert into states (code, name) values ('ME','Maine');
insert into states (code, name) values ('MD','Maryland');
insert into states (code, name) values ('MA','Massachusetts');
insert into states (code, name) values ('MI','Michigan');
insert into states (code, name) values ('MN','Minnesota');
insert into states (code, name) values ('MS','Mississippi');
insert into states (code, name) values ('MO','Missouri');
insert into states (code, name) values ('MT','Montana');
insert into states (code, name) values ('NE','Nebraska');
insert into states (code, name) values ('NV','Nevada');
insert into states (code, name) values ('NH','New Hampshire');
insert into states (code, name) values ('NJ','New Jersey');
insert into states (code, name) values ('NM','New Mexico');
insert into states (code, name) values ('NY','New York');
insert into states (code, name) values ('NC','North Carolina');
insert into states (code, name) values ('ND','North Dakota');
insert into states (code, name) values ('OH','Ohio');
insert into states (code, name) values ('OK','Oklahoma');
insert into states (code, name) values ('OR','Oregon');
insert into states (code, name) values ('PA','Pennsylvania');
insert into states (code, name) values ('RI','Rhode Island');
insert into states (code, name) values ('SC','South Carolina');
insert into states (code, name) values ('SD','South Dakota');
insert into states (code, name) values ('TN','Tennessee');
insert into states (code, name) values ('TX','Texas');
insert into states (code, name) values ('UT','Utah');
insert into states (code, name) values ('VT','Vermont');
insert into states (code, name) values ('VA','Virginia');
insert into states (code, name) values ('WA','Washington');
insert into states (code, name) values ('WV','West Virginia');
insert into states (code, name) values ('WI','Wisconsin');
insert into states (code, name) values ('WY','Wyoming');

-- -----------------------------------------------------
-- Table volunteers
-- -----------------------------------------------------
DROP TABLE IF EXISTS volunteers ;

CREATE TABLE IF NOT EXISTS volunteers (
  id INT(11) NOT NULL AUTO_INCREMENT,
  active TINYINT(4) NOT NULL DEFAULT '1',
  first_name VARCHAR(45) NOT NULL,
  last_name VARCHAR(45) NOT NULL,
  home_phone VARCHAR(20) NOT NULL,
  email VARCHAR(45) NOT NULL,
  add_to_mailing_list TINYINT(4) NOT NULL,
  address1 VARCHAR(80) NOT NULL,
  address2 VARCHAR(80) NULL DEFAULT NULL,
  policy_agreement TINYINT(4) NULL DEFAULT NULL,
  city VARCHAR(45) NOT NULL,
  zip_code VARCHAR(20) NOT NULL,
  weekend_availability TINYINT(4) NULL DEFAULT NULL,
  summer_camp_availability TINYINT(4) NULL DEFAULT NULL,
  other_role_text VARCHAR(80) NULL DEFAULT NULL,
  background_check_agreement TINYINT(4) NULL DEFAULT NULL,
  states_code CHAR(2) NOT NULL,
  lead_sources_id INT(11) NOT NULL,
  shirt_sizes_id INT(11) NOT NULL,
  special_skills tinyint(4) not null default '0',
  special_skills_text varchar(120) null,
  youth_volunteer_exp tinyint(4) not null default '0',
  youth_volunteer_exp_text varchar(120) null,
  non_youth_volunteer_exp tinyint(4) not null default '0',
  non_youth_volunteer_exp_text varchar(120) null,
  created DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  last_updated DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (id),
  INDEX fk_volunteers_shirt_sizes_idx (shirt_sizes_id ASC),
  INDEX fk_volunteers_states_idx (states_code ASC),
  INDEX fk_volunteers_lead_sources_idx (lead_sources_id ASC),
  CONSTRAINT fk_volunteers_shirt_sizes
    FOREIGN KEY (shirt_sizes_id)
    REFERENCES shirt_sizes (id)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT fk_volunteers_states
    FOREIGN KEY (states_code)
    REFERENCES states (code)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT fk_volunteers_lead_sources
    FOREIGN KEY (lead_sources_id)
    REFERENCES lead_sources (id)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table volunteer_references
-- -----------------------------------------------------
DROP TABLE IF EXISTS volunteer_references ;

CREATE TABLE IF NOT EXISTS volunteer_references (
  id INT(11) NOT NULL AUTO_INCREMENT,
  volunteers_id INT(11) NOT NULL,
  active TINYINT(4) NULL DEFAULT '1',
  full_name VARCHAR(60) NOT NULL,
  phone_number VARCHAR(20) NOT NULL,
  email VARCHAR(45) NOT NULL,
  relationship VARCHAR(45) NOT NULL,
  created DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  last_updated DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (id),
  INDEX fk_volunteer_references_volunteers_idx (volunteers_id ASC),
  CONSTRAINT fk_volunteer_references_volunteers
    FOREIGN KEY (volunteers_id)
    REFERENCES volunteers (id)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table volunteer_roles
-- -----------------------------------------------------
DROP TABLE IF EXISTS volunteer_roles ;

CREATE TABLE IF NOT EXISTS volunteer_roles (
  id INT(11) NOT NULL AUTO_INCREMENT,
  active TINYINT(4) NOT NULL DEFAULT '1',
  volunteers_id INT(11) NOT NULL,
  roles_id INT(11) NOT NULL,
  created DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  last_updated DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (id),
  UNIQUE INDEX id_UNIQUE (id ASC),
  INDEX fk_volunteer_roles_volunteers_idx (volunteers_id ASC),
  INDEX fk_volunteer_roles_roles_idx (roles_id ASC),
  CONSTRAINT fk_volunteer_roles_volunteers
    FOREIGN KEY (volunteers_id)
    REFERENCES volunteers (id)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT fk_volunteer_roles_roles
    FOREIGN KEY (roles_id)
    REFERENCES roles (id)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table youth
-- -----------------------------------------------------
DROP TABLE IF EXISTS youth ;

CREATE TABLE IF NOT EXISTS youth (
  id INT(11) NOT NULL AUTO_INCREMENT,
  active TINYINT(4) NULL DEFAULT '1',
  first_name VARCHAR(45) NOT NULL,
  last_name VARCHAR(45) NOT NULL,
  home_phone VARCHAR(20) NOT NULL,
  email VARCHAR(45) NOT NULL,
  graduating_class INT(11) NOT NULL,
  college_of_interest VARCHAR(45) NULL DEFAULT NULL,
  career_aspirations varchar(80) NULL DEFAULT NULL,
  food_snacks VARCHAR(80) NULL DEFAULT NULL,
  date_of_birth DATE NOT NULL,
  other_ethnicity_text VARCHAR(80) NULL DEFAULT NULL,
  guardian_full_name VARCHAR(60) NOT NULL,
  guardian_phone VARCHAR(20) NOT NULL,
  guardian_email VARCHAR(45) NOT NULL,
  created DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  last_updated DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  ethnicities_id INT(11) NOT NULL,
  genders_id INT(11) NOT NULL,
  PRIMARY KEY (id),
  UNIQUE INDEX id_UNIQUE (id ASC),
  INDEX fk_youth_ethnicities_idx (ethnicities_id ASC),
  INDEX fk_youth_genders_idx (genders_id ASC),
  CONSTRAINT fk_youth_ethnicities
    FOREIGN KEY (ethnicities_id)
    REFERENCES ethnicities (id)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT fk_youth_genders
    FOREIGN KEY (genders_id)
    REFERENCES genders (id)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

SET FOREIGN_KEY_CHECKS = 1;

-- create views

create or replace view v_volunteers as
select v.id AS volunteer_id,v.first_name AS first_name,v.last_name AS last_name,
v.home_phone AS home_phone,v.email AS email,v.add_to_mailing_list AS add_to_mailing_list,v.address1 AS address1,v.address2 AS address2,v.policy_agreement AS policy_agreement,
v.city AS city,v.states_code AS states_code,states.name AS state,v.zip_code AS zip_code,v.weekend_availability AS weekend_availability,v.summer_camp_availability AS summer_camp_availability,
v.other_role_text AS other_role_text,v.background_check_agreement AS background_check_agreement,v.shirt_sizes_id AS shirt_sizes_id,shirt_sizes.size AS shirt_size,v.lead_sources_id AS lead_sources_id,
lead_sources.lead AS lead,v.active AS active,v.special_skills AS special_skills,v.special_skills_text AS special_skills_text,v.youth_volunteer_exp AS youth_volunteer_exp,
v.youth_volunteer_exp_text AS youth_volunteer_exp_text,v.non_youth_volunteer_exp AS non_youth_volunteer_exp,v.non_youth_volunteer_exp_text AS non_youth_volunteer_exp_text
from (((volunteers v left join states on((states.code = v.states_code))) left join shirt_sizes on((shirt_sizes.id = v.shirt_sizes_id))) left join lead_sources on((lead_sources.id = v.lead_sources_id))) ;

create or replace view v_volunteer_references
AS  select v.id AS volunteer_id,v.first_name AS volunteer_first_name,v.last_name AS volunteer_last_name,
vr.full_name AS reference,vr.phone_number AS ref_phone,vr.email AS ref_email, vr.relationship AS relationship,v.active AS volunteer_active
from (volunteers v left join volunteer_references vr on((vr.volunteers_id = v.id))) ;

create or replace view v_volunteer_roles as
select v.id as volunteer_id, v.first_name as volunteer_first_name, v.last_name as volunteer_last_name, r.role, vr.active
from volunteers v left outer join volunteer_roles vr on vr.volunteers_id = v.id
left outer join roles r on r.id = vr.roles_id;

create or replace view v_youth as
select y.id as youth_id, y.first_name, y.last_name, y.home_phone, y.email, y.graduating_class, y.college_of_interest,
  y.food_snacks, y.date_of_birth, y.genders_id, g.gender, y.ethnicities_id, e.ethnicity, y.career_aspirations,
  case when length(COALESCE(y.other_ethnicity_text,'')) < 1 then e.ethnicity
  else concat(e.ethnicity, " : ", y.other_ethnicity_text)
  end as ethnicity_all, y.guardian_full_name, y.guardian_email, y.guardian_phone, y.active
from youth y
left outer join genders g on g.id = y.genders_id
left outer join ethnicities e on e.id = y.ethnicities_id;

create or replace view v_dreamers as
select y.id as dreamer_id, y.first_name, y.last_name, y.home_phone, y.email, y.graduating_class, y.college_of_interest,
  y.food_snacks, y.date_of_birth, y.genders_id, g.gender, y.ethnicities_id, e.ethnicity, y.career_aspirations,
  case when length(COALESCE(y.other_ethnicity_text,'')) < 1 then e.ethnicity
  else concat(e.ethnicity, " : ", y.other_ethnicity_text)
  end as ethnicity_all, y.guardian_full_name, y.guardian_email, y.guardian_phone, y.active
from youth y
left outer join genders g on g.id = y.genders_id
left outer join ethnicities e on e.id = y.ethnicities_id;
