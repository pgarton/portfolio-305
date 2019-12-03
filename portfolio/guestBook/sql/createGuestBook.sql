/*
First Name: Paul
Last Name: Garton
Title: VP
Company: neuCam
LinkedIn:
Email: n3ucam@gmail.com
Comment: test
Add to mailing list
Format: html
How we met: other
Other meetup info: other text

create_date timestamp
*/

-- -----------------------------------------------------
-- Table entries
-- -----------------------------------------------------
DROP TABLE IF EXISTS entries ;

CREATE TABLE IF NOT EXISTS entries (
  id INT(11) NOT NULL AUTO_INCREMENT,
  first_name VARCHAR(50) NOT NULL,
  last_name VARCHAR(50) NOT NULL,
  title VARCHAR(50) NULL,
  linked_in VARCHAR(80) NULL,
  email VARCHAR(80) NOT NULL,
  comment VARCHAR(255);
  add_to_mailing_list TINYINT(4) default TRUE,
  format VARCHAR(30);
  how_we_met VARCHAR(30),
  meetup_other VARCHAR(255),
  created DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  last_updated DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (id),
  UNIQUE INDEX id_UNIQUE (id ASC))
ENGINE = InnoDB
AUTO_INCREMENT = 1
DEFAULT CHARACTER SET = utf8;



