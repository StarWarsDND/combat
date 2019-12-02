USE StarWarsDND;
SELECT DATABASE();

DROP TABLE campaign_play;

CREATE TABLE campaign_play (cpID INT AUTO_INCREMENT, campaignID INT, userid INT, 
	sHealthPoints INT(8), damage INT(4), eHealthPoints INT(8), 
		CONSTRAINT campaign_play_cpID_pk PRIMARY KEY (cpID),
		CONSTRAINT campaign_play_campaignID_fk FOREIGN KEY (campaignID)
		REFERENCES campaign(campaignID),
		CONSTRAINT campaign_play_userid_fk FOREIGN KEY(userid)
		REFERENCES users(userid));

INSERT INTO campaign_play (cpID, campaignID, userid, sHealthPoints, damage, eHealthPoints)
	VALUES (0001, 0001, 0001, 890, 50, 840),
		   (0002, 0001, 0002, 1220, 20, 1200),
		   (0003, 0001, 0003, 904, 30, 874),
		   (0004, 0002, 0001, 840, 20, 820),
		   (0005, 0002, 0002, 1200, 35, 1165),
		   (0006, 0002, 0003, 874, 15, 859),		   
		   (0007, 0003, 0001, 820, 8, 812),
		   (0008, 0003, 0002, 1165, 10, 1155),
		   (0009, 0003, 0003, 859, 5, 854),
		   (0010, 0004, 0001, 820, 8, 812),
		   (0011, 0004, 0002, 1155, 5, 1150),
		   (0012, 0004, 0003, 854, 10, 844),	
		   (0013, 0005, 0001, 812, 2, 810),
		   (0014, 0005, 0002, 1150, 20, 1130),
		   (0015, 0005, 0003, 844, 4, 840); 
COMMIT;