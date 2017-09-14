create table orders(
    id integer auto_increment,
    timestamp timestamp default current_timestamp,
    phone varchar(20) not null,
    longitude varchar(10),
    latitude varchar(10),
    completed boolean default 0,
    primary key(id)
);
