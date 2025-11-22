CREATE TABLE Cosmetics (
CosmeticsID               INT(11)        NOT NULL,
CosmeticsCode             VARCHAR(10)    NOT NULL   UNIQUE,
CosmeticsName             VARCHAR(255)   NOT NULL,
CosmeticsDescription      TEXT           NOT NULL,
CosmeticsTypeID           INT(11)        NOT NULL,
CosmeticsWholesalePrice   DECIMAL(10,2)  NOT NULL,
CosmeticsListPrice        DECIMAL(10,2)  NOT NULL,
DateTimeCreated     TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
DateTimeUpdated     TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
PRIMARY KEY ( CosmeticsID )
);

INSERT INTO Cosmetics
(CosmeticsID, CosmeticsCode, CosmeticsName, CosmeticsDescription, CosmeticsTypeID, CosmeticsWholesalePrice, CosmeticsListPrice)
VALUES
(1000, 'COSMO1', 'Velvet Bloom Blush', 'A silky powder blush that adds a natural rosy glow', 101, 6.50, 14.99);

INSERT INTO Cosmetics
(CosmeticsID, CosmeticsCode, CosmeticsName, CosmeticsDescription, CosmeticsTypeID, CosmeticsWholesalePrice, CosmeticsListPrice)
VALUES
(2000, 'COSMO2', 'HydraGlow Serum', 'Lightweight serum that hydrates and brightens dull skin', 102, 9.75, 22.00);

INSERT INTO Cosmetics
(CosmeticsID, CosmeticsCode, CosmeticsName, CosmeticsDescription, CosmeticsTypeID, CosmeticsWholesalePrice, CosmeticsListPrice)
VALUES
(3000, 'THT', 'Toleriane Hydrating Gentle Cleanser', 'A daily face wash formulated with ceramides and niacinamide to gently cleanse while maintaining skin\'s natural barrier. Ideal for normal to dry sensitive skin.', 200, 10.75, 26.00);

INSERT INTO Cosmetics
(CosmeticsID, CosmeticsCode, CosmeticsName, CosmeticsDescription, CosmeticsTypeID, CosmeticsWholesalePrice, CosmeticsListPrice)
VALUES
(4000, 'B2B', 'Effaclar Adapalene Gel 0.1% Acne Treatment', 'A prescription-strength retinoid gel that treats acne, unclogs pores, and prevents future breakouts. Suitable for oily and acne-prone skin.', 200, 15.75, 35.00);

SELECT * FROM Cosmetics;

