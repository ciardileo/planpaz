use planpaz;

insert into gender values (1,'Masculino');
insert into gender values (2,'Feminino');
insert into gender values (3,'Outro');

insert into country values (1,'Australia');
insert into country values (2,'Brasil');
insert into country values (3,'Marrocos');
insert into country values (4,'Indonésia');
insert into country values (5,'China');

insert into users values ('Andrew Gabriel', 'andrewggst@gmail.com', '1234', now(),'Hi, My name is Andrew. I Like Abacate.','2008-01-08',1,2,);

-- name varchar(100) NOT NULL,
--   username varchar(50) UNIQUE NOT NULL,
--   email varchar(150) UNIQUE NOT NULL,
--   password varchar(50) NOT NULL,
--   created_at datetime NOT NULL DEFAULT 'now',
--   bio text,
--   birthdate date,
--   gender_id int,
--   country_id int,
--   main_goal enum('decoration','alimentation','well-beign','sustainability'),
--   room_luminosity enum('low','medium','intense'),
--   space_disponibilty enum('small','medium','large'),
--   experience_level enum('beginner','intermediate','advanced'),
--   time_availability enum('daily','weekly','sporadic')