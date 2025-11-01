CREATE TABLE CosmeticsTypes (
CosmeticsTypeID      INT(11)        NOT NULL,
CosmeticsTypeCode    VARCHAR(255)   NOT NULL   UNIQUE,
CosmeticsTypeName    VARCHAR(255)   NOT NULL,
DateTimeCreated   TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
DateTimeUpdated   TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
PRIMARY KEY ( CosmeticsTypeID )
);


INSERT INTO CosmeticsTypes
(CosmeticsTypeID, CosmeticsTypeCode, CosmeticsTypeName)
VALUES
(100, 'Loreal', 'Cleanser');

INSERT INTO CosmeticsTypes
(CosmeticsTypeID, CosmeticsTypeCode, CosmeticsTypeName)
VALUES
(200, 'Larochposay', 'Toner');



SELECT * FROM CosmeticsTypes;