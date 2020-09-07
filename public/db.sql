create database db_hotel charset utf8mb4;

create user 'hotelu'@'localhost' identified by '12345';

grant all on db_hotel.* to 'hotelu'@'localhost';

alter user 'hotelu'@'localhost' identified with mysql_native_password by '12345';

flush privileges;

mysql -u hotelu -p12345;

create table users(
    id int auto_increment primary key,
    userName varchar(50) not null unique,
    pwd varchar(200) not null,
    sex varchar(20) not null,
    age varchar(20) not null,
    email varchar(50) not null
);
create table admins(
    id int auto_increment primary key,
    userName varchar(50) not null unique,
    pwd varchar(200) not null,
    sex varchar(20) not null,
    age varchar(20) not null,
    email varchar(50) not null
);

create table customerInfo(
    id int auto_increment primary key not null,
    name varchar(50) not null,
    sex varchar(10) not null,
    age varchar(10) not null,
    address varchar(100) not null,
    tel varchar(50) not null,
    IDNumber varchar(100) not null,
    checkInTime varchar(100) not null,
    checkOutTime varchar(100)
);

create table roomInfo(
    id int auto_increment primary key not null,
    roomType varchar(50) not null,
    price varchar(50) not null,
    roomID varchar(50) not null,
    status varchar(20) not null,
    description varchar(100)
);
create table RoomHousingInfo(
    id int auto_increment primary key not null,
    roomType varchar(50) not null,
    roomID varchar(50) not null,
    name varchar(50) not null,
    sex varchar(10) not null,
    age varchar(10) not null,
    address varchar(100) not null,
    tel varchar(50) not null,
    IDNumber varchar(100) not null,
    checkInTime varchar(100) not null
);

insert into roomInfo (roomType,price,roomID,status,description) values ('单人间','100元/天','101','住房','一张单人床的房间');
insert into roomInfo (roomType,price,roomID,status,description) values ('单人间','100元/天','102','空房','一张单人床的房间');
insert into roomInfo (roomType,price,roomID,status,description) values ('标准间','200元/天','103','住房','两张标准单人床的房间');
insert into roomInfo (roomType,price,roomID,status,description) values ('标准间','200元/天','104','空房','两张标准单人床的房间');
insert into roomInfo (roomType,price,roomID,status,description) values ('大床间','300元/天','105','住房','一张大床的房间');
insert into roomInfo (roomType,price,roomID,status,description) values ('大床间','300元/天','106','空房','一张大床的房间');
insert into roomInfo (roomType,price,roomID,status,description) values ('三人间','400元/天','107','住房','三张单人床的房间');
insert into roomInfo (roomType,price,roomID,status,description) values ('三人间','400元/天','108','空房','三张单人床的房间');
insert into roomInfo (roomType,price,roomID,status,description) values ('套间','500元/天','109','住房','卧房带客厅');
insert into roomInfo (roomType,price,roomID,status,description) values ('套间','500元/天','110','空房','卧房带客厅');
insert into roomInfo (roomType,price,roomID,status,description) values ('豪华间','600元/天','111','住房','卧房带客厅，设施更豪华');
insert into roomInfo (roomType,price,roomID,status,description) values ('豪华间','600元/天','112','空房','卧房带客厅，设施更豪华');


create table member(
    id int auto_increment primary key not null,
    name varchar(50) not null,
    sex varchar(20) not null,
    age varchar(20) not null,
    address varchar(100) not null,
    email varchar(50) not null,
    tel varchar(50) not null,
    IDNumber varchar(100) not null,
    registrationTime varchar(100) not null,
    deadline varchar(100) not null
); 

create table customerBookInfo(
    id int auto_increment primary key not null,
    name varchar(50) not null,
    sex varchar(20) not null,
    age varchar(20) not null,
    tel varchar(50) not null,
    IDNumber varchar(100) not null,
    roomType varchar(50) not null,
    roomID varchar(50) not null,
    bookTime varchar(50) not null,
    checkOutTime varchar(50) not null
    
);
create table memberBookInfo(
    id int auto_increment primary key not null,
    name varchar(50) not null,
    sex varchar(20) not null,
    age varchar(20) not null,
    tel varchar(50) not null,
    IDNumber varchar(100) not null,
    roomType varchar(50) not null,
    roomID varchar(50) not null,
    bookTime varchar(50) not null,
    checkOutTime varchar(50) not null
);
create table businessRecord(
    id int auto_increment primary key not null,
    name varchar(50) not null,
    IDNumber varchar(100) not null,
    tel varchar(50) not null,
    roomType varchar(50) not null,
    roomID varchar(50) not null,
    price varchar(50) not null,
    checkInTime varchar(100) not null,
    checkOutTime varchar(100) not null,
    totalPrice varchar(100) not null
);




