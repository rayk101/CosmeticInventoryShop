CREATE TABLE CosmeticsManagers (
 CosmeticsManagerID  INT(11)        NOT NULL   AUTO_INCREMENT,
 emailAddress        VARCHAR(255)   NOT NULL   UNIQUE,
 password            VARCHAR(64)    NOT NULL,
 pronouns            VARCHAR(60)    NOT NULL,
 firstName           VARCHAR(60)    NOT NULL,
 lastName            VARCHAR(60)    NOT NULL,
 DateTimeCreated     TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
 DateTimeUpdated     TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
 PRIMARY KEY (CosmeticsManagerID)
);


INSERT INTO CosmeticsManagers
(emailAddress, password, pronouns, firstName, lastName)
VALUES
('Rahym@cosmetics.com', SHA2('Password', 256), 'He/Him', 'Rahym', 'Ahmed');


INSERT INTO CosmeticsManagers
(emailAddress, password, pronouns, firstName, lastName)
VALUES
('Wire@cosmetics.com', SHA2('Password1', 256), 'He/Him', 'Wire', 'Post');


INSERT INTO CosmeticsManagers
(emailAddress, password, pronouns, firstName, lastName)
VALUES
('Megan@cosmetics.com', SHA2('Password2', 256), 'She/Her', 'Megan', 'Fox');