CREATE TABLE users(
	_id int not null AUTO_INCREMENT,
	username VARCHAR(50) NOT NULL,
	password VARCHAR(15) NOT NULL,
	PRIMARY KEY (_id)
	);

INSERT INTO users (username,password)
   VALUES ('testuser','passit');