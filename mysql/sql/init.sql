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
INSERT INTO users SET name='かずき', email='test@webapp.com', password= '$2y$10$ozxkhAEW8yeC2hvru.8zj.YDnu8Wmmvr6ACSi8kheGyCyzsWP81Zm';
INSERT INTO users SET name='かずき2', email='test2@webapp.com', password= '$2y$10$ozxkhAEW8yeC2hvru.8zj.YDnu8Wmmvr6ACSi8kheGyCyzsWP81Zm';