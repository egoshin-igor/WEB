USE `web_lab_6+`;
-- 1
SELECT pc_id, `cpu(MHz)`, `memory(Mb)` FROM pc
WHERE
	`memory(Mb)` = 3000;
    
SELECT MIN(`hdd(Gb)`) as hdd FROM pc;

SELECT COUNT(`hdd(Gb)`), MIN(`hdd(Gb)`) as min_hdd FROM pc
GROUP BY
	`hdd(Gb)`
ORDER BY
	`hdd(Gb)` ASC
LIMIT 1;
    
-- 2
CREATE TABLE IF NOT EXISTS track_downloads( 
      download_id BIGINT(20) NOT NULL AUTO_INCREMENT, 
      track_id INT NOT NULL, 
      user_id BIGINT(20) NOT NULL, 
      download_time TIMESTAMP NOT NULL DEFAULT NOW(), 
       
      PRIMARY KEY (download_id) 
    );

/*
INSERT INTO track_downloads
VALUES
	(DEFAULT, FLOOR(1 + RAND()*100), FLOOR(1 + RAND()*100), "2010-11-19 1:0:0" + INTERVAL FLOOR(RAND() * 23) HOUR);
*/ -- переделать
DROP TABLE IF EXISTS download_list;
CREATE TEMPORARY TABLE IF NOT EXISTS download_list
	SELECT COUNT(user_id) AS download_count FROM track_downloads
	WHERE
		download_time BETWEEN "2010-11-19 0:0:0" AND "2010-11-19 23:59:59"
	GROUP BY
		user_id;
    
SELECT download_count, COUNT(download_count) as user_count FROM download_list
GROUP BY
	download_count
ORDER BY
	download_count;

-- 3
/*
DATETIME - Хранит время в виде целого числа вида YYYYMMDDHHMMSS, используя для этого 8 байтов.
Это время не зависит от временной зоны.(Значение по умолчанию 1900-01-01-00:00:00)

TIMESTAMP - Хранит 4-байтное целое число, равное количеству секунд, прошедших с полуночи 1 января 1970 года по усреднённому времени Гринвича
При получении из базы отображается с учётом часового пояса
SET @@session.time_zone='+01:00';	
insert into dt1 values(now());
*/

-- 4
CREATE TEMPORARY TABLE IF NOT EXISTS students_in_subject
	SELECT subject_id FROM student_subject
	GROUP BY
		subject_id
	HAVING
		COUNT(student_id) > 5;
        
SELECT COUNT(subject_id) as subject_amount FROM students_in_subject;

-- 5
/*
Может, если на столбец не наложено ограничение not null
*/
UPDATE student_subject
SET student_id = NULL
WHERE
	student_subject_id = 1;

-- 6

