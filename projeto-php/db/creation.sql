create database planpaz;
use planpaz;

CREATE TABLE gender (
  id int PRIMARY KEY NOT NULL,
  name varchar(50) NOT NULL
);

CREATE TABLE country (
  id int PRIMARY KEY NOT NULL,
  name varchar(70) NOT NULL
);

/*usuarios*/
CREATE TABLE users (
  id int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  name varchar(100) NOT NULL,
  username varchar(50) UNIQUE NOT NULL,
  email varchar(150) UNIQUE NOT NULL,
  password varchar(50) NOT NULL,
  created_at datetime NOT NULL DEFAULT now(),
  bio text,
  birthdate date,
  gender_id int,
  country_id int,
  main_goal enum('decoration','alimentation','well-beign','sustainability'),
  room_luminosity enum('low','medium','intense'),
  space_disponibilty enum('small','medium','large'),
  experience_level enum('beginner','intermediate','advanced'),
  time_availability enum('daily','weekly','sporadic')
);

CREATE TABLE post (
  id int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  author_id int NOT NULL,
  posted_at datetime NOT NULL DEFAULT now(),
  title varchar(100) NOT NULL,
  content text NOT NULL,
  media varchar(300)
);

CREATE TABLE comment (
  id int PRIMARY KEY NOT NULL,
  author_id int NOT NULL,
  post_id int,
  comment_id int,
  content text NOT NULL,
  commented_at datetime NOT NULL DEFAULT now()
);

CREATE TABLE likes (
  author_id int NOT NULL,
  post_id int NOT NULL,
  liked_at datetime NOT NULL DEFAULT now()
);

/*planta*/
CREATE TABLE plant (
  id int PRIMARY KEY NOT NULL,
  name varchar(50) NOT NULL,
  scientific_name varchar(100) NOT NULL,
  description text,
  watering_level enum('daily','weekly','sporadic'),
  luminosity_level enum('low','medium','intense'),
  temperature_level enum('low','medium','high'),
  size enum('small','medium','large') NOT NULL,
  type enum('edible','aromatic','other') NOT NULL,
  image varchar(100)
);

CREATE TABLE plants_stages (
  id int PRIMARY KEY NOT NULL,
  plant_id int NOT NULL,
  name varchar(25),
  days int,
  description text,
  image varchar(100)
);

CREATE TABLE garden_plant (
  id int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  owner_id int NOT NULL,
  plant_id int NOT NULL,
  plant_nickname varchar(50),
  quantity int NOT NULL DEFAULT 1,
  planted_at date NOT NULL,
  watering_notification bool NOT NULL DEFAULT 1,
  stage_notification bool NOT NULL DEFAULT 1,
  stage int NOT NULL,
  image varchar(100)
);

CREATE TABLE followers (
  follower_id int NOT NULL,
  follow_id int NOT NULL
);

ALTER TABLE user ADD FOREIGN KEY (gender_id) REFERENCES gender (id);

ALTER TABLE user ADD FOREIGN KEY (country_id) REFERENCES country (id);

ALTER TABLE user ADD FOREIGN KEY (id) REFERENCES post (author_id);

ALTER TABLE user ADD FOREIGN KEY (id) REFERENCES comment (author_id);

ALTER TABLE post ADD FOREIGN KEY (id) REFERENCES comment (post_id);

ALTER TABLE comment ADD FOREIGN KEY (id) REFERENCES comment (comment_id);

ALTER TABLE user ADD FOREIGN KEY (id) REFERENCES likes (author_id);

ALTER TABLE post ADD FOREIGN KEY (id) REFERENCES likes (post_id);

ALTER TABLE plant ADD FOREIGN KEY (id) REFERENCES plants_stages (plant_id);

ALTER TABLE user ADD FOREIGN KEY (id) REFERENCES garden_plant (owner_id);

ALTER TABLE plant ADD FOREIGN KEY (id) REFERENCES garden_plant (plant_id);

ALTER TABLE plants_stages ADD FOREIGN KEY (id) REFERENCES garden_plant (stage);

ALTER TABLE user ADD FOREIGN KEY (id) REFERENCES followers (follower_id);

ALTER TABLE user ADD FOREIGN KEY (id) REFERENCES followers (follow_id);
