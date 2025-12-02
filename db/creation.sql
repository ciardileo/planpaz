create database planpaz;
use planpaz;

CREATE TABLE gender (
  id INT PRIMARY KEY,
  name VARCHAR(50) NOT NULL
);

CREATE TABLE country (
  id INT PRIMARY KEY,
  name VARCHAR(70) NOT NULL
);

CREATE TABLE users (
  id INT PRIMARY KEY AUTO_INCREMENT,
  name VARCHAR(100) NOT NULL,
  username VARCHAR(50) UNIQUE NOT NULL,
  email VARCHAR(150) UNIQUE NOT NULL,
  password VARCHAR(50) NOT NULL,
  created_at DATETIME NOT NULL DEFAULT NOW(),
  bio TEXT,
  birthdate DATE,
  gender_id INT,
  country_id INT,
  main_goal ENUM('decoration','alimentation','well-being','sustainability'),
  room_luminosity ENUM('low','medium','intense'),
  space_disponibility ENUM('small','medium','large'),
  experience_level ENUM('beginner','intermediate','advanced'),
  time_availability ENUM('daily','weekly','sporadic'),
  FOREIGN KEY (gender_id) REFERENCES gender(id),
  FOREIGN KEY (country_id) REFERENCES country(id)
);

CREATE TABLE post (
  id INT PRIMARY KEY AUTO_INCREMENT,
  author_id INT NOT NULL,
  posted_at DATETIME NOT NULL DEFAULT NOW(),
  title VARCHAR(100) NOT NULL,
  content TEXT NOT NULL,
  media VARCHAR(300),
  FOREIGN KEY (author_id) REFERENCES users(id)
);

CREATE TABLE comment (
  id INT PRIMARY KEY AUTO_INCREMENT,
  author_id INT NOT NULL,
  post_id INT,
  parent_comment_id INT,
  content TEXT NOT NULL,
  commented_at DATETIME NOT NULL DEFAULT NOW(),
  FOREIGN KEY (author_id) REFERENCES users(id),
  FOREIGN KEY (post_id) REFERENCES post(id),
  FOREIGN KEY (parent_comment_id) REFERENCES comment(id)
);

CREATE TABLE likes (
  author_id INT NOT NULL,
  post_id INT NOT NULL,
  liked_at DATETIME NOT NULL DEFAULT NOW(),
  PRIMARY KEY (author_id, post_id),
  FOREIGN KEY (author_id) REFERENCES users(id),
  FOREIGN KEY (post_id) REFERENCES post(id)
);

CREATE TABLE plant (
  id INT PRIMARY KEY,
  name VARCHAR(50) NOT NULL,
  scientific_name VARCHAR(100) NOT NULL,
  description TEXT,
  watering_level ENUM('daily','weekly','sporadic'),
  luminosity_level ENUM('low','medium','intense'),
  temperature_level ENUM('low','medium','high'),
  size ENUM('small','medium','large') NOT NULL,
  type ENUM('edible','aromatic','other') NOT NULL,
  image VARCHAR(300)
);

CREATE TABLE plants_stages (
  id INT PRIMARY KEY AUTO_INCREMENT,
  plant_id INT NOT NULL,
  name VARCHAR(25),
  days INT,
  description TEXT,
  image VARCHAR(100),
  FOREIGN KEY (plant_id) REFERENCES plant(id)
);

CREATE TABLE garden_plant (
  id INT PRIMARY KEY AUTO_INCREMENT,
  owner_id INT NOT NULL,
  plant_id INT NOT NULL,
  plant_nickname VARCHAR(50),
  quantity INT NOT NULL DEFAULT 1,
  planted_at DATE NOT NULL,
  watering_notification BOOL NOT NULL DEFAULT 1,
  stage_notification BOOL NOT NULL DEFAULT 1,
  stage_id INT,
  FOREIGN KEY (owner_id) REFERENCES users(id),
  FOREIGN KEY (plant_id) REFERENCES plant(id),
  FOREIGN KEY (stage_id) REFERENCES plants_stages(id)
);

CREATE TABLE followers (
  follower_id INT NOT NULL,
  follow_id INT NOT NULL,
  PRIMARY KEY (follower_id, follow_id),
  FOREIGN KEY (follower_id) REFERENCES users(id),
  FOREIGN KEY (follow_id) REFERENCES users(id)
);