create database weddingd;
use weddingd;

create table clients(
 client_id int not null auto_increment primary key,
 cname varchar(60),
 address varchar(120)
)

create table music(
music_id int not null auto_increment primary key, 
mobile varchar(15),
email varchar(30),
address varchar(60),
name varchar(30),
price varchar(10),
includes varchar(60),
status varchar(15)
)

create table flower(
flower_id int not null auto_increment primary key, 
mobile varchar(15),
email varchar(30),
address varchar(60),
name varchar(30),
price varchar(10),
includes varchar(60),
status varchar(15)
)

create table makeup(
makeup_id int not null auto_increment primary key, 
mobile varchar(15),
email varchar(30),
address varchar(60),
name varchar(30),
price varchar(10),
includes varchar(60),
status varchar(15)
)

create table wedding(
wedding_id int not null auto_increment primary key, 
wdate varchar(30),
venue varchar(30),
budget varchar(20)
);

create table event(
e_id int not null auto_increment primary key, 
event_id int, 
makeup_id int,
flower_id int,
music_id int, 
status varchar(20),
cost varchar(20),
foreign key(e_id) references event_req(event_id),
foreign key(makeup_id) references makeup(makeup_id),
foreign key(flower_id) references flower(flower_id),
foreign key(music_id) references music(music_id)
);


create table event_req(
event_id int not null auto_increment primary key, 
client_id int, 
wedding_id int,
makeup varchar(200),
flower varchar(200),
music varchar(200),
foreign key(client_id) references clients(client_id),
foreign key(wedding_id) references wedding(wedding_id)
);




select * from event_req;
select * from event_req;

alter table event_req 
add column event_req_status varchar(30);

alter table event_req 
drop column event_req_status;

update event_req set event_req_status="created" where event_id=1;
update event_req set event_req_status="pending_approval" where event_id=3;

select * from flower;
insert into flower (flower_id, mobile, email, address, name, price, includes, status) values (1, "0782302200", "test@gmail.com", "wattala", "thisara flora", "139000", "oillamp", "Unsold");
insert into flower (flower_id, mobile, email, address, name, price, includes, status) values (2, "0782302201", "test@gmail.com", "nagoda", "chithra flora", "139000", "oillamp", "Unsold");
insert into flower (flower_id, mobile, email, address, name, price, includes, status) values (3, "0782302202", "test@gmail.com", "kalamulla", "flora flora", "139000", "oillamp", "Unsold");
insert into flower (flower_id, mobile, email, address, name, price, includes, status) values (4, "0782302203", "test@gmail.com", "kandana", "newum flora", "139000", "oillamp", "Unsold");



select * from music;
insert into music (music_id, mobile, email, address, name, price, includes, status) values (1, "0782302200", "test@gmail.com", "wattala", "ASP", "139000", "Band", "Unsold");
insert into music (music_id, mobile, email, address, name, price, includes, status) values (2, "0782302201", "test@gmail.com", "nagoda", "Black Eargle", "139000", "DJ", "Unsold");
insert into music (music_id, mobile, email, address, name, price, includes, status) values (3, "0782302202", "test@gmail.com", "kalamulla", "Daddy", "139000", "DJ and Band", "Unsold");


select * from makeup;
insert into makeup (makeup_id, mobile, email, address, name, price, includes, status) values (1, "0782302200", "test@gmail.com", "wattala", "Salon Nayana", "139000", "Bride only", "Unsold");
insert into makeup (makeup_id, mobile, email, address, name, price, includes, status) values (2, "0782302201", "test@gmail.com", "nagoda", "Black Salon", "139000", "Bride and four bridesmaids", "Unsold");
insert into makeup (makeup_id, mobile, email, address, name, price, includes, status) values (3, "0782302202", "test@gmail.com", "kalamulla", "Queens Salon", "139000", "Bride and Eight bridesmaids", "Unsold");



create table event_plan(
event_plan_id int not null auto_increment primary key, 
event_req_id int, 
flower_id int, 
makeup_id int, 
music_id int,
foreign key(event_req_id) references event_req(event_id),
foreign key(makeup_id) references makeup(makeup_id),
foreign key(music_id) references music(music_id),
foreign key(flower_id) references flower(flower_id)
);

insert into clients (cname, address) values ("client", "Trinco");

select * from clients;
select client_id from clients where cname="client";


select * from event_req;

update event_req set event_req_status="finalized" where event_id=1;
update event_req set client_id=3 where event_id=2;

select * from event_plan;

insert into event_plan (event_req_id, flower_id, makeup_id, music_id) values (2,3,1,2);

select * from flower;
select * from makeup;
select * from music;

select * from `event_plan` where event_req_id= 2;

insert into event_req (client_id, wedding_id, makeup, flower, music, event_req_status) values (4, 2, "bride only on wedding day", "church and hotel deco", "Both DJ and Band", "altered");
insert into event_req (client_id, wedding_id, makeup, flower, music, event_req_status) values (5, 2, "bride only on wedding day", "church and hotel deco", "Both DJ and Band", "created");
altered


select * from wedding;

select * from clients;


select * from event_plan;
