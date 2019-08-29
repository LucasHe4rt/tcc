create table admins(

    `id` int(2) primary key auto_increment,
    `username` varchar(80) not null,
    `password` varchar(30) not null
);

create table establishments(

    `id` int(8) primary key auto_increment,
    `name` varchar(80) not null,
    `cnpj` varchar(14) not null,
    `address` varchar(80) not null,
    `description` text not  null

);

create table phones_estab(

    `id` int(2) primary key auto_increment,
    `number` varchar(10) not null,
    `establishment_id`int(8) not null

);

create table photos(

    `id` int(4) primary key auto_increment,
    `directory` varchar(60) not null,
    `establishment_id`int(8) not null

);

create table types(

    `id` int(2) primary key auto_increment,
    `name` varchar(30),
    `establishment_id`int(8) not null

);

create table ratings(

    `id` int(4) primary key auto_increment,
    `rating` int(1) not null,
    `description` text not null,
    `establishment_id`int(8) not null

);