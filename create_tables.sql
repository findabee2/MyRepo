 /*	creates the players table
	Also known as the Members' File
 */
CREATE TABLE players
	(
	memberID int NOT NULL AUTO_INCREMENT,
	fNameame VARCHAR(255) NOT NULL,
	lName VARCHAR(255) NOT NULL,
	email VARCHAR(255),
	phone VARCHAR(20),
	PRIMARY KEY(memberID)
	);

/*	creates the player_score table
	keeps track of players' scores per game
*/
CREATE TABLE player_score 
	(
	scoreID int(10) NOT NULL AUTO_INCREMENT,
	memberID int(10) NOT NULL, 
	memberScore int(10) NOT NULL,
	eventID int NOT NULL,
	PRIMARY KEY (scoreID),
	CONSTRAINT fk_eventID 
		FOREIGN KEY(eventID) 
		REFERENCES schedule(eventID)
		ON DELETE CASCADE
	CONSTRAINT fk_member_scoring
		FOREIGN KEY(memberid) 
		REFERENCES players(memberID)
		ON DELETE CASCADE
	);

/*	creates the board game table
*/
CREATE TABLE board_game 
	(
	gameID int(10) NOT NULL AUTO_INCREMENT,
	boardGame varchar(255) NOT NULL,
	position varchar(255) NOT NULL,
	notes varchar(255),
	PRIMARY KEY (gameID)
	);

/*	creates the board_game_owners table
	for who is playing what game
*/
CREATE TABLE board_game_owners	
	(
	assignmentID int NOT NULL AUTO_INCREMENT,
	memberID int(10) NOT NULL,
	gameID INT (10) NOT NULL,
	PRIMARY KEY (assignmentID),
	CONSTRAINT fk_memberID
		FOREIGN KEY (memberID)
		REFERENCES players(memberID)
		ON DELETE CASCADE
	CONSTRAINT fk_gameID
		FOREIGN KEY (gameID)
		REFERENCES board_game(gameID)
		ON DELETE CASCADE		
	);

/*	creates the schedule table 
	to store which games are being played where and when
*/
CREATE TABLE schedule	
	(
	eventID int NOT NULL AUTO_INCREMENT,
	eventVenue varchar(255) NOT NULL,
	eventStart varchar(255) NOT NULL,
	eventEnd varchar(255) NOT NULL,
	eventDesc varchar(255) NOT NULL,
	eventCapacity varchar(255) NOT NULL,
	PRIMARY KEY (eventID),
	);

