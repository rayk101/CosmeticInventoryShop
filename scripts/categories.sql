CREATE TABLE categories (
 categoryID       INT(11)        NOT NULL,
 categoryCode     VARCHAR(10)    NOT NULL,
 categoryName     VARCHAR(255)   NOT NULL,
 PRIMARY KEY (categoryID)
);

INSERT INTO categories
(categoryID, categoryCode, categoryName)
VALUES
(100, 'GTR', 'Guitars');

-- Optional
DELETE from categories where categoryID = 100;

SELECT * FROM categories;