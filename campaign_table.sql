USE StarWarsDND;
SELECT DATABASE();


CREATE TABLE campaign (campaignID INT AUTO_INCREMENT, game_date DATE, PRIMARY KEY (campaignID));

INSERT INTO campaign (campaignID, game_date)
	VALUES (0001, '2019-11-01'),
		   (0002, '2019-11-08'),
		   (0003, '2019-11-15'),
		   (0004, '2019-11-22'),
		   (0005, '2019-11-29'); 
COMMIT;