CREATE TABLE users(
   id_user INT NOT NULL AUTO_INCREMENT,
   name VARCHAR(50),
   first_name VARCHAR(50),
   mail VARCHAR(320) NOT NULL,
   password VARCHAR(255) NOT NULL,
   token VARCHAR(50),
   is_admin BOOLEAN,
   various VARCHAR(255),
   picture VARCHAR(127),
   create_at DATETIME NOT NULL,
   update_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
   PRIMARY KEY(id_user),
   UNIQUE(mail)
);

CREATE TABLE stands(
   id_stand INT NOT NULL AUTO_INCREMENT,
   name VARCHAR(50) NOT NULL,
   place VARCHAR(254) NOT NULL,
   various VARCHAR(254),
   create_at DATETIME NOT NULL,
   update_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
   PRIMARY KEY(id_stand),
   UNIQUE(name)
);

CREATE TABLE partnerships(
   id_partnership INT NOT NULL AUTO_INCREMENT,
   partnership_user VARCHAR(50),
   create_at DATETIME NOT NULL,
   update_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
   PRIMARY KEY(id_partnership)
);

CREATE TABLE partners(
   id_partner INT NOT NULL AUTO_INCREMENT,
   responsible_name VARCHAR(50),
   responsible_first_name VARCHAR(50),
   mail VARCHAR(320) NOT NULL,
   social_reason VARCHAR(50),
   phone VARCHAR(16),
   logo VARCHAR(50),
   create_at DATETIME,
   update_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
   id_partnership INT NOT NULL,
   PRIMARY KEY(id_partner),
   UNIQUE(mail),
   FOREIGN KEY(id_partnership) REFERENCES partnerships(id_partnership)
);

CREATE TABLE collects(
   id_collect INT NOT NULL AUTO_INCREMENT,
   collect_money DECIMAL(7,2) NOT NULL,
   date_collect DATETIME NOT NULL,
   create_at DATETIME NOT NULL,
   update_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
   id_partner INT NOT NULL,
   id_stand INT NOT NULL,
   PRIMARY KEY(id_collect),
   FOREIGN KEY(id_partner) REFERENCES partners(id_partner),
   FOREIGN KEY(id_stand) REFERENCES stands(id_stand)
);
