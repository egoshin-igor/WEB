USE rental;

-- 3
DELETE FROM dvd;
ALTER TABLE dvd AUTO_INCREMENT = 1;
INSERT INTO dvd
VALUES
	(DEFAULT, "Игра Престолов", 2009),
    (DEFAULT, "Поймай меня, если сможешь", 2002),
    (DEFAULT, "Головолмка", 2015),
    (DEFAULT, "Марсианин", 2015),
    (DEFAULT, "Я сражаюсь с великанами", 2002),
    (DEFAULT, "Алиса в Стране чудес", 2010),
    (DEFAULT, "Гарри Поттер и дары смерти", 2010),
    (DEFAULT, "Как приручить дракона", 2010);

DELETE FROM customer;
ALTER TABLE customer AUTO_INCREMENT = 1;
INSERT INTO customer
VALUES
	(DEFAULT, "Иван", "Иванов",  "8812-098100", NOW() - INTERVAL FLOOR(RAND() * 40) DAY),
    (DEFAULT, "Егор", "Егоров",  "8812-098101", NOW() - INTERVAL FLOOR(RAND() * 40) DAY),
    (DEFAULT, "Михаил", "Михайлов",  "8812-098102", NOW() - INTERVAL FLOOR(RAND() * 40) DAY),
    (DEFAULT, "Антон", "Антонов",  "8812-098103", NOW() - INTERVAL FLOOR(RAND() * 40) DAY),
    (DEFAULT, "Дмитрий", "Дмитров",  "8812-098104", NOW() - INTERVAL FLOOR(RAND() * 40) DAY),
    (DEFAULT, "Иван", "Иванов",  "8812-098105", NOW() - INTERVAL FLOOR(RAND() * 40) DAY);

DELETE FROM offer;
ALTER TABLE offer AUTO_INCREMENT = 1;
SELECT @dvd_count := COUNT(dvd_id) FROM dvd;
SELECT @customer_count := COUNT(customer_id) FROM customer;
SELECT @offer_date := DATE(NOW() - INTERVAL FLOOR(RAND() * 200) DAY);
SELECT @return_date := @offer_date + INTERVAL FLOOR(RAND() * 200) DAY;
INSERT INTO offer
VALUES
	(DEFAULT, FLOOR(1 + RAND()*@dvd_count), FLOOR(1 + RAND()*@customer_count), @offer_date, @return_date);

-- 4
SELECT title, production_year FROM dvd
WHERE production_year = 2010
ORDER BY title;

-- 5
SELECT offer.offer_id, dvd.title FROM offer
LEFT JOIN dvd ON offer.dvd_id = dvd.dvd_id
WHERE
	NOW() BETWEEN offer.offer_date and offer.return_date
ORDER BY dvd.title;
    
-- 6
SELECT customer.first_name, customer.last_name, dvd.title FROM offer
LEFT JOIN dvd ON offer.dvd_id = dvd.dvd_id
LEFT JOIN customer ON offer.customer_id = customer.customer_id
WHERE
	YEAR(NOW()) =  YEAR(offer.offer_date)
ORDER BY customer.first_name, customer.last_name;