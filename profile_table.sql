USE StarWarsDND;
SELECT DATABASE();

CREATE TABLE profile (PID INT AUTO_INCREMENT, userid INT, 
	abilityScore INT(3), modifier INT(3), profienciency INT(2), difficulty INT(2), skills TEXT(500), variant INT(2), qScore INT(3),
		CONSTRAINT profile_PID_pk PRIMARY KEY (PID),
		CONSTRAINT profile_userid_fk FOREIGN KEY(userid)
		REFERENCES users(userid));

INSERT INTO profile (PID, userid, abilityScore, modifier, profienciency, difficulty, skills,  variant, qScore)
	VALUES (0001, 0001, 8, -1, 1, 10, 'Sleight of hand, Arcana, Nature, Investigation, Wisdom, Medicine, Jumping, Climbing', 3, 21),
		   (0002, 0002, 14, 2, 12,15, 'Athletics, Stealth, Religion, Survival, Persuasion', 10, 53),
		   (0003, 0003, 20, 5, 18, 25, 'Acrobatics, Sleight of Hand, Wisdom, History, Perception, Deception, Performance, Persuasion', 20, 88 ); 
COMMIT;