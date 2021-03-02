DROP TABLE if exists figures;
DROP TABLE if exists images;

CREATE DATABASE if not exists figure_db;

CREATE TABLE if not exists figures (
	name VARCHAR(200),
	type VARCHAR(15),
    price FLOAT,
    image VARCHAR(200),
    brand VARCHAR(200),
    franchise VARCHAR(200)
);

CREATE TABLE if not exists images (
	name VARCHAR(200),
	path VARCHAR(200)
);

INSERT INTO figures (name, type, price, image, brand, franchise)
VALUES ("Zoro", "Standard", "39", "view/images/Zoro.jpg", "Kadokawa", "OnePiece"),
	   ("Madara", "Statue", "999", "view/images/Madara.png", "GoodSmile", "Naruto"),
       ("2B", "Nendoroid", "59", "view/images/2B.png", "Alter", "Nier"),
       ("Miku", "Standard", "44", "view/images/Miku.png", "Aniplex", "Vocaloid"),
	   ("Kirishima", "Nendoroid", "69", "view/images/Kirishima.png", "Kadokawa", "BNHA"),
	   ("Ichigo", "Statue", "1399", "view/images/Ichigo.png", "GoodSmile", "Bleach");
       
INSERT INTO images (name, path)
VALUES ("Banner1", "view/images/Banner1.png"),
	   ("Banner2", "view/images/Banner2.png"),
       ("Banner3", "view/images/Banner3.png");