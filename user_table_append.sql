USE StarWarsDND;
SELECT DATABASE();


CREATE TABLE users (userid INT AUTO_INCREMENT, username VARCHAR(20), 
	password VARCHAR(16), characterName VARCHAR(20), role VARCHAR(15), image BLOB(500), PRIMARY KEY (userid));

INSERT INTO users (userid, username, password, characterName, role, image)
	VALUES (0001, 'happyGrlSA76', 'p#$sW0rD', 'Ahsoka', 'admin'),
		(0002, 'ImperialAce1917', 'password', 'Vader', 'admin'),
		(0003, 'aRandom', 'password', 'Palpatine', 'dm'),
		(0004, 'axeWielder', 'password', 'Zuhl', 'player'); 
COMMIT;
	