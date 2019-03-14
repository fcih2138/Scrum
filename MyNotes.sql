create database MyNotes;
use MyNotes;

create table users (

user_id int PRIMARY KEY AUTO_INCREMENT ,
user_email varchar (50) UNIQUE,
user_fname varchar (50),
user_lname varchar (50),
user_password varchar (50),
user_phhone varchar (50),
user_address varchar (50),
isBlocked varchar (50)

);

create table note (

user_id int,
note_id int PRIMARY KEY AUTO_INCREMENT ,
note_title varchar (50),
note_imageurl varchar (50),
message_length int,
FOREIGN KEY (user_id) REFERENCES users(user_id)

);

create table admin (

admin_id int PRIMARY KEY AUTO_INCREMENT ,
admin_email varchar (50) UNIQUE,
admin_password varchar (50),
privs int

);

INSERT INTO admin (admin_email,admin_password) VALUES ('adel@admin.com', '12345678');