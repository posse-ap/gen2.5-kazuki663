DROP SCHEMA IF EXISTS webapp;
CREATE SCHEMA webapp;
USE webapp;
DROP TABLE IF EXISTS users;
CREATE TABLE users (
  id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  email VARCHAR(255) NOT NULL,
  password VARCHAR(255) NOT NULL,
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
  updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);
DROP TABLE IF EXISTS languages;
CREATE TABLE languages (
  id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
  language VARCHAR(255) NOT NULL
);
DROP TABLE IF EXISTS contents;
CREATE TABLE contents (
  id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
  content VARCHAR(255) NOT NULL
);
DROP TABLE IF EXISTS study_time;
CREATE TABLE study_time (
  id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
  user_id INT NOT NULL,
  time INT NOT NULL,
  day DATETIME NOT NULL
);
DROP TABLE IF EXISTS study_languages;
CREATE TABLE study_languages (
  id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
  user_id INT NOT NULL,
  language_id INT NOT NULL,
  day DATETIME NOT NULL
);
DROP TABLE IF EXISTS study_contents;
CREATE TABLE study_contents (
  id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
  user_id INT NOT NULL,
  content_id INT NOT NULL,
  day DATETIME NOT NULL
);

INSERT INTO users SET name='かずき', email='test@webapp.com', password= '$2y$10$ozxkhAEW8yeC2hvru.8zj.YDnu8Wmmvr6ACSi8kheGyCyzsWP81Zm';
INSERT INTO users SET name='かずき2', email='test2@webapp.com', password= '$2y$10$ozxkhAEW8yeC2hvru.8zj.YDnu8Wmmvr6ACSi8kheGyCyzsWP81Zm';
INSERT INTO languages
    (language)
VALUES
    ('HTML'),
    ('CSS'),
    ('JavaScript'),
    ('PHP'),
    ('Laravel'),
    ('SQL'),
    ('SHELL'),
    ('情報システム基礎知識（その他）');
INSERT INTO contents
    (content)
VALUES
    ('N予備校'),
    ('ドットインストール'),
    ('POSSE課題');
INSERT INTO study_time
    (user_id, time, day)
VALUES
    (1, 8, '2022/08/01'),
    (1, 2, '2022/08/02'),
    (1, 1, '2022/08/03'),
    (1, 6, '2022/08/04'),
    (1, 3, '2022/08/06'),
    (1, 4, '2022/08/08'),
    (1, 1, '2022/08/09'),
    (1, 7, '2022/08/10'),
    (1, 2, '2022/08/11'),
    (1, 1, '2022/08/13'),
    (1, 4, '2022/08/14'),
    (1, 5, '2022/08/14'),
    (1, 3, '2022/08/16'),
    (1, 2, '2022/08/17'),
    (1, 9, '2022/08/18'),
    (1, 3, '2022/08/19'),
    (1, 2, '2022/08/20'),
    (1, 1, '2022/08/21'),
    (1, 1, '2022/08/23'),
    (1, 4, '2022/08/25'),
    (1, 3, '2022/08/26'),
    (1, 6, '2022/08/27'),
    (1, 5, '2022/08/28'),
    (1, 4, '2022/08/30'),
    (1, 1, '2022/08/31'),
    (1, 3, '2022/09/01'),
    (1, 2, '2022/09/02'),
    (1, 1, '2022/09/04'),
    (1, 7, '2022/09/05'),
    (1, 3, '2022/09/06'),
    (1, 8, '2022/09/07'),
    (1, 3, '2022/09/09'),
    (1, 7, '2022/09/10'),
    (1, 2, '2022/09/12'),
    (1, 2, '2022/09/13'),
    (1, 4, '2022/09/14'),
    (1, 7, '2022/09/15'),
    (1, 3, '2022/09/16'),
    (1, 2, '2022/09/17'),
    (1, 3, '2022/09/18'),
    (1, 5, '2022/09/19'),
    (1, 2, '2022/09/20'),
    (1, 1, '2022/09/21'),
    (1, 1, '2022/09/22'),
    (1, 4, '2022/09/25'),
    (1, 6, '2022/09/26'),
    (1, 6, '2022/09/27'),
    (1, 2, '2022/09/28'),
    (1, 4, '2022/09/30'),
    (2, 3, '2022/08/01'),
    (2, 2, '2022/08/02'),
    (2, 4, '2022/08/03'),
    (2, 6, '2022/08/04'),
    (2, 2, '2022/08/05'),
    (2, 4, '2022/08/08'),
    (2, 1, '2022/08/09'),
    (2, 7, '2022/08/10'),
    (2, 2, '2022/08/11'),
    (2, 4, '2022/08/13'),
    (2, 4, '2022/08/14'),
    (2, 8, '2022/08/15'),
    (2, 3, '2022/08/16'),
    (2, 1, '2022/08/17'),
    (2, 9, '2022/08/18'),
    (2, 3, '2022/08/20'),
    (2, 2, '2022/08/20'),
    (2, 3, '2022/08/21'),
    (2, 1, '2022/08/23'),
    (2, 4, '2022/08/24'),
    (2, 3, '2022/08/26'),
    (2, 6, '2022/08/27'),
    (2, 2, '2022/08/28'),
    (2, 7, '2022/08/30'),
    (2, 1, '2022/08/31'),
    (2, 3, '2022/09/01'),
    (2, 2, '2022/09/02'),
    (2, 1, '2022/09/03'),
    (2, 7, '2022/09/05'),
    (2, 2, '2022/09/06'),
    (2, 1, '2022/09/08'),
    (2, 3, '2022/09/09'),
    (2, 2, '2022/09/12'),
    (2, 4, '2022/09/13'),
    (2, 7, '2022/09/15'),
    (2, 5, '2022/09/16'),
    (2, 2, '2022/09/17'),
    (2, 3, '2022/09/18'),
    (2, 2, '2022/09/20'),
    (2, 1, '2022/09/21'),
    (2, 1, '2022/09/22'),
    (2, 4, '2022/09/24'),
    (2, 3, '2022/09/25'),
    (2, 6, '2022/09/27'),
    (2, 2, '2022/09/27'),
    (2, 7, '2022/09/30');
INSERT INTO study_languages
    (user_id, language_id, day)
VALUES
    (1, 8, '2022/08/01'),
    (1, 2, '2022/08/02'),
    (1, 1, '2022/08/03'),
    (1, 2, '2022/08/03'),
    (1, 6, '2022/08/04'),
    (1, 3, '2022/08/06'),
    (1, 4, '2022/08/08'),
    (1, 1, '2022/08/09'),
    (1, 3, '2022/08/09'),
    (1, 7, '2022/08/10'),
    (1, 2, '2022/08/11'),
    (1, 1, '2022/08/13'),
    (1, 4, '2022/08/14'),
    (1, 5, '2022/08/14'),
    (1, 3, '2022/08/16'),
    (1, 2, '2022/08/17'),
    (1, 5, '2022/08/18'),
    (1, 3, '2022/08/19'),
    (1, 2, '2022/08/20'),
    (1, 1, '2022/08/21'),
    (1, 1, '2022/08/23'),
    (1, 4, '2022/08/25'),
    (1, 3, '2022/08/26'),
    (1, 6, '2022/08/27'),
    (1, 5, '2022/08/28'),
    (1, 4, '2022/08/30'),
    (1, 1, '2022/08/31'),
    (1, 3, '2022/09/01'),
    (1, 2, '2022/09/02'),
    (1, 1, '2022/09/04'),
    (1, 7, '2022/09/05'),
    (1, 3, '2022/09/06'),
    (1, 8, '2022/09/07'),
    (1, 3, '2022/09/09'),
    (1, 7, '2022/09/10'),
    (1, 2, '2022/09/12'),
    (1, 2, '2022/09/13'),
    (1, 4, '2022/09/14'),
    (1, 7, '2022/09/15'),
    (1, 3, '2022/09/16'),
    (1, 2, '2022/09/17'),
    (1, 3, '2022/09/18'),
    (1, 5, '2022/09/19'),
    (1, 2, '2022/09/20'),
    (1, 1, '2022/09/21'),
    (1, 1, '2022/09/22'),
    (1, 4, '2022/09/25'),
    (1, 6, '2022/09/26'),
    (1, 6, '2022/09/27'),
    (1, 2, '2022/09/28'),
    (1, 4, '2022/09/30'),
    (2, 3, '2022/08/01'),
    (2, 2, '2022/08/02'),
    (2, 4, '2022/08/03'),
    (2, 6, '2022/08/04'),
    (2, 2, '2022/08/05'),
    (2, 4, '2022/08/08'),
    (2, 1, '2022/08/09'),
    (2, 7, '2022/08/10'),
    (2, 2, '2022/08/11'),
    (2, 4, '2022/08/13'),
    (2, 4, '2022/08/14'),
    (2, 8, '2022/08/15'),
    (2, 3, '2022/08/16'),
    (2, 1, '2022/08/17'),
    (2, 4, '2022/08/18'),
    (2, 3, '2022/08/20'),
    (2, 2, '2022/08/20'),
    (2, 3, '2022/08/21'),
    (2, 1, '2022/08/23'),
    (2, 4, '2022/08/24'),
    (2, 3, '2022/08/26'),
    (2, 6, '2022/08/27'),
    (2, 2, '2022/08/28'),
    (2, 7, '2022/08/30'),
    (2, 1, '2022/08/31'),
    (2, 3, '2022/09/01'),
    (2, 2, '2022/09/02'),
    (2, 1, '2022/09/03'),
    (2, 7, '2022/09/05'),
    (2, 2, '2022/09/06'),
    (2, 1, '2022/09/08'),
    (2, 3, '2022/09/09'),
    (2, 2, '2022/09/12'),
    (2, 4, '2022/09/13'),
    (2, 7, '2022/09/15'),
    (2, 5, '2022/09/16'),
    (2, 2, '2022/09/17'),
    (2, 3, '2022/09/18'),
    (2, 6, '2022/09/18'),
    (2, 5, '2022/09/18'),
    (2, 2, '2022/09/20'),
    (2, 1, '2022/09/21'),
    (2, 1, '2022/09/22'),
    (2, 4, '2022/09/24'),
    (2, 3, '2022/09/25'),
    (2, 6, '2022/09/27'),
    (2, 2, '2022/09/27'),
    (2, 7, '2022/09/30');
INSERT INTO study_contents
    (user_id, content_id, day)
VALUES 
    (1, 2, '2022/08/01'),
    (1, 2, '2022/08/02'),
    (1, 1, '2022/08/03'),
    (1, 2, '2022/08/03'),
    (1, 1, '2022/08/04'),
    (1, 1, '2022/08/06'),
    (1, 3, '2022/08/08'),
    (1, 1, '2022/08/09'),
    (1, 3, '2022/08/09'),
    (1, 2, '2022/08/10'),
    (1, 2, '2022/08/11'),
    (1, 1, '2022/08/13'),
    (1, 3, '2022/08/14'),
    (1, 1, '2022/08/14'),
    (1, 3, '2022/08/16'),
    (1, 2, '2022/08/17'),
    (1, 3, '2022/08/18'),
    (1, 3, '2022/08/19'),
    (1, 2, '2022/08/20'),
    (1, 1, '2022/08/21'),
    (1, 1, '2022/08/23'),
    (1, 2, '2022/08/25'),
    (1, 3, '2022/08/26'),
    (1, 3, '2022/08/27'),
    (1, 2, '2022/08/28'),
    (1, 3, '2022/08/30'),
    (1, 1, '2022/08/31'),
    (1, 3, '2022/09/01'),
    (1, 2, '2022/09/02'),
    (1, 1, '2022/09/04'),
    (1, 1, '2022/09/05'),
    (1, 3, '2022/09/06'),
    (1, 2, '2022/09/07'),
    (1, 3, '2022/09/09'),
    (1, 3, '2022/09/10'),
    (1, 2, '2022/09/12'),
    (1, 2, '2022/09/13'),
    (1, 1, '2022/09/14'),
    (1, 3, '2022/09/15'),
    (1, 3, '2022/09/16'),
    (1, 2, '2022/09/17'),
    (1, 3, '2022/09/18'),
    (1, 2, '2022/09/19'),
    (1, 2, '2022/09/20'),
    (1, 1, '2022/09/21'),
    (1, 1, '2022/09/22'),
    (1, 3, '2022/09/25'),
    (1, 2, '2022/09/26'),
    (1, 2, '2022/09/27'),
    (1, 2, '2022/09/28'),
    (1, 3, '2022/09/30'),
    (2, 3, '2022/08/01'),
    (2, 2, '2022/08/02'),
    (2, 3, '2022/08/03'),
    (2, 2, '2022/08/04'),
    (2, 1, '2022/08/05'),
    (2, 2, '2022/08/08'),
    (2, 3, '2022/08/09'),
    (2, 3, '2022/08/10'),
    (2, 3, '2022/08/11'),
    (2, 2, '2022/08/13'),
    (2, 2, '2022/08/14'),
    (2, 2, '2022/08/15'),
    (2, 3, '2022/08/16'),
    (2, 1, '2022/08/17'),
    (2, 1, '2022/08/18'),
    (2, 3, '2022/08/20'),
    (2, 2, '2022/08/20'),
    (2, 2, '2022/08/21'),
    (2, 3, '2022/08/23'),
    (2, 3, '2022/08/24'),
    (2, 1, '2022/08/26'),
    (2, 2, '2022/08/27'),
    (2, 3, '2022/08/28'),
    (2, 2, '2022/08/30'),
    (2, 1, '2022/08/31'),
    (2, 3, '2022/09/01'),
    (2, 2, '2022/09/02'),
    (2, 1, '2022/09/03'),
    (2, 3, '2022/09/05'),
    (2, 2, '2022/09/06'),
    (2, 1, '2022/09/08'),
    (2, 3, '2022/09/09'),
    (2, 2, '2022/09/12'),
    (2, 2, '2022/09/13'),
    (2, 3, '2022/09/15'),
    (2, 3, '2022/09/16'),
    (2, 2, '2022/09/17'),
    (2, 3, '2022/09/18'),
    (2, 1, '2022/09/18'),
    (2, 2, '2022/09/18'),
    (2, 2, '2022/09/20'),
    (2, 1, '2022/09/21'),
    (2, 1, '2022/09/22'),
    (2, 3, '2022/09/24'),
    (2, 2, '2022/09/25'),
    (2, 1, '2022/09/27'),
    (2, 2, '2022/09/27'),
    (2, 3, '2022/09/30');