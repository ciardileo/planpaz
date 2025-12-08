/* versão simplificada apenas para a primeira entrega de dsw */

create database planpaz;
use planpaz;

create table user (
    id int primary key auto_increment,
    username varchar(50),
    first_name varchar(10),
    email varchar(70),
    password varchar(60)
);

create table garden_plant (
    id int primary key auto_increment,
    user_id int,
    foreign key (user_id) references user (id),
    nickname varchar(15),
    specie varchar(15),
    stage int default 1,
    image varchar(300),
    planted_at date
);

/* inserts */
INSERT INTO user (username, first_name, email, password) VALUES
('leonardo', 'Leo', 'leo@example.com', 'hash1'),
('mariah', 'Maria', 'maria@example.com', 'hash2'),
('johnny', 'John', 'john@example.com', 'hash3');

INSERT INTO garden_plant (user_id, nickname, specie, stage, image, planted_at) VALUES
(1, 'Cacto', 'Cacto', 1, 'https://images.unsplash.com/photo-1687106358396-20daadef9e36?fm=jpg&q=60&w=3000&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8bGl0dGxlJTIwcGxhbnR8ZW58MHx8MHx8fDA%3D', '2024-10-01'),
(1, 'Rosa', 'Rosa', 2, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSojHQ_LcajFihsYXBYDAoikhLa77aAjEt8Ig&s', '2024-11-05'),
(2, 'Basil', 'Basil', 1, 'https://d2csxpduxe849s.cloudfront.net/media/E32629C6-9347-4F84-81FEAEF7BFA342B3/450E9326-0272-405C-B8D614C72BED9F89/52F2110A-1CAA-43C0-BE84F352D8AB0835/WebsiteJpg_XL-FPLS_Main%20Visual_Green_Website.jpg', '2024-09-20'),
(3, 'Orchid', 'Orquídea', 3, 'https://d2csxpduxe849s.cloudfront.net/media/E32629C6-9347-4F84-81FEAEF7BFA342B3/450E9326-0272-405C-B8D614C72BED9F89/52F2110A-1CAA-43C0-BE84F352D8AB0835/WebsiteJpg_XL-FPLS_Main%20Visual_Green_Website.jpg', '2024-08-15');

