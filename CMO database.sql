create database CMO;
use CMO;

create table Users(
user_id int auto_increment PRIMARY KEY,
email varchar(100) not null UNIQUE,
password_hash varchar(100) not null,
user_role enum('Student', 'Faculty', 'General', 'Admin') not null default 'General',
full_name varchar(100) not null,
created_at timestamp default current_timestamp,
is_active boolean default true);

create table Books(
book_id int auto_increment PRIMARY KEY,
isbn varchar(100) not null unique,
title varchar(100) not null,
author varchar(100) not null,
category varchar(100) not null,
is_available boolean default true);


create table Borrowing(
transaction_id int auto_increment primary KEY,
user_id int not null,
book_id int not null,
borrow_date date not null,
due_date date not null,
status ENUM('Borrowed', 'Returned', 'Overdue') default 'Borrowed',
-- Syntax to create the foreign key for User
constraint fk_user
	foreign key(user_id)
	references Users(user_id)
    on delete cascade,
-- Syntax to create the foreign key for Book
constraint fk_book
	foreign key (book_id)
    references Books(book_id)
    on delete restrict);
    
    
## INSERT INTO Users (email, password_hash, user_role, full_name)
