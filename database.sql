create database test_technique;

\c test_technique


create table admin(
    id serial primary key,
    identifiant varchar(255),
    password text
);


insert into admin(identifiant,password) values ('admin','admin');


