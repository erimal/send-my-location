create table orders(
    id integer primary key,
    timestamp date default (datetime('now', 'localtime')),
    phone varchar(20) not null,
    longitude varchar(8),
    latitude varchar(8)
);



