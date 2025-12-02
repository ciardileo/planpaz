use planpaz;

insert into gender values (1,'masculino');
insert into gender values (2,'feminino');
insert into gender values (3,'outros');

insert into country values (1,'Brasil');
insert into country values (2,'Estados Unidos');
insert into country values (3,'Argentina');
insert into country values (4,'Bolívia');
insert into country values (5,'Colômbia');

select * from gender;

select * from country;


INSERT INTO users (name, username, email, password, bio, birthdate, gender_id, country_id, main_goal, room_luminosity, space_disponibility, experience_level, time_availability)
VALUES ('Andrew Gabriel','andrewggst','andrewggst@gmail.com','5paodemel','Hi, My name is Andrew. I Like two candys.','2008-01-08', 1, 1,'alimentation','medium','medium','intermediate','weekly'
);

INSERT INTO users (name, username, email, password, bio, birthdate, gender_id, country_id, main_goal, room_luminosity, space_disponibility, experience_level, time_availability)
VALUES ('Matheus Pietro','piietro.10','piietroesoh@gmail.com','botafogo','Sou o mp e vou cultivar coco para fazer óleo de coco.','2007-10-17', 1, 1,'alimentation','medium','large','beginner','daily'
);

INSERT INTO users (name, username, email, password, bio, birthdate, gender_id, country_id, main_goal, room_luminosity, space_disponibility, experience_level, time_availability)
VALUES ('João Paulo Collado','jpc1112','joaoeangelica@gmail.com','matemagicas','Eu sumo de São Miguel e apareço em Itaquera.','2007-12-26', 1, 1,'alimentation','medium','large','beginner','daily'
);

INSERT INTO users (name, username, email, password, bio, birthdate, gender_id, country_id, main_goal, room_luminosity, space_disponibility, experience_level, time_availability)
VALUES ('João Manuel Oliveira','manual','manual252@gmail.com','katatonia','Iremos cultivar a paz com o PlanPaz!.','2007-08-28', 1, 1,'sustainability','low','small','beginner','daily'
);

INSERT INTO users (name, username, email, password, bio, birthdate, gender_id, country_id, main_goal, room_luminosity, space_disponibility, experience_level, time_availability)
VALUES ('Leonardo Lopes Ciardi','financeirodogremio','desviando@gmail.com','desviodogremio123','Poooooxa! Na próxima eu consigo!!.','2007-10-04', 1, 1,'sustainability','low','large','intermediate','daily'
);

select* from users;

INSERT INTO plant VALUES
(1, 'Manjericão', 'Ocimum basilicum', 'Erva aromática muito usada na culinária.', 'daily', 'medium', 'medium', 'small', 'aromatic', 'https://www.instaagro.com/media/wysiwyg/plantar_manjericao.jpg'),
(2, 'Tomate', 'Solanum lycopersicum', 'Planta frutífera comum em hortas caseiras.', 'daily', 'intense', 'medium', 'medium', 'edible', 'https://www.jardineiro.net/wp-content/uploads/2019/10/tomatoes-1561565_1920.jpg'),
(3, 'Hortelã', 'Mentha spicata', 'Planta refrescante, cresce rápido.', 'daily', 'medium', 'medium', 'small', 'aromatic', 'https://minhasplantas3.s3.amazonaws.com/media/plantas/galeria/Mentha-piperita-07.jpg'),
(4, 'Alecrim', 'Salvia rosmarinus', 'Aromática resistente, pouca manutenção.', 'weekly', 'intense', 'high', 'medium', 'aromatic', 'https://s2.glbimg.com/ev4J4_MHZYdjpmymwfw2RthHrkw=/e.glbimg.com/og/ed/f/original/2022/05/31/dicas-para-plantar-o-alecrim-e-mante-lo-saudavel-1.jpg'),
(5, 'Alface', 'Lactuca sativa', 'Hortaliça de ciclo curto.', 'daily', 'low', 'low', 'medium', 'edible', 'https://img.freepik.com/fotos-premium/alface-planta-na-horta-close-up_70216-4305.jpg');

select* from plant;

INSERT INTO plants_stages (plant_id, name, days, description, image) VALUES
(1, 'Germinação', 7, 'Primeiras folhinhas surgem.', 'stage1.jpg'),
(2, 'Muda', 15, 'A planta começa a se fortalecer.', 'stage2.jpg'),
(3, 'Desenvolvimento', 30, 'Folhas maiores e crescimento rápido.', 'stage3.jpg'),
(4, 'Floração', 45, 'Aparecem flores pequenas aromáticas.', 'stage4.jpg'),
(5, 'Colheita', 60, 'Momento apropriado para colher.', 'stage5.jpg');

select* from plants_stages;


INSERT INTO post (author_id, title, content, media) VALUES
(1, 'Meu primeiro plantio', 'Comecei hoje minha horta!', 'plantio1.jpg'),
(2, 'Coco crescendo', 'Atualização sobre meu coqueiro.', 'coco.jpg'),
(3, 'Alface quase pronta', 'A colheita vem aí!', 'alface.jpg'),
(4, 'Alecrim forte', 'Crescendo muito bem!', NULL),
(5, 'Manjericão aromático', 'O cheiro está incrível.', 'manjericao_post.jpg');

select * from post;

INSERT INTO comment (author_id, post_id, parent_comment_id, content) VALUES
(2, 1, NULL, 'Boa sorte na horta aí paizaão!'),
(3, 1, 1, 'Concordo, vai ficar showw!'),
(4, 3, NULL, 'Essa alface tá chave!'),
(1, 5, NULL, 'Manjericão tá só o caule!'),
(5, 4, NULL, 'Alecrim é muito resistente mesmo.');

select * from comment;

INSERT INTO likes VALUES
(1, 2, NOW()),
(2, 1, NOW()),
(3, 5, NOW()),
(4, 3, NOW()),
(5, 4, NOW());

select * from likes;

INSERT INTO garden_plant (owner_id, plant_id, plant_nickname, quantity, planted_at, stage_id) VALUES
(1, 1, 'Manjericãozinho', 1, '2024-10-10', 1),
(2, 2, 'Coco Tunado pro óleo de coco', 2, '2024-09-20', 2),
(3, 3, 'Hortelãzinha páaa', 1, '2024-11-01', 3),
(4, 4, 'Alecrão', 1, '2024-08-15', 4),
(5, 5, 'Alface Ninja', 4, '2024-10-22', 5);

select * from garden_plant;

INSERT INTO followers VALUES
(1, 2),
(2, 3),
(3, 4),
(4, 5),
(5, 1);

select * from followers;
