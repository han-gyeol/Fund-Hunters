/***************************

users

***************************/
/* 
prevent characters like & in strings to be interpreted  by Oracle 
remove in PostfreSQL
*/
set define off
/*
ALTER SESSION modifies the date format YYYY-MM-DD in Oracle
the default date format is '01-Jan-07' (DD-MON-YY)
remove for PostgreSQL
*/
alter session set NLS_DATE_FORMAT='YYYY-MM-DD';

insert into users values ('Rob','robert123@nus.edu.sg','1993-05-12','Blk 390 Marine Parade Street' ,'482c811da5d5b4bc6d497ffa98491e38','ACTIVE');
insert into users values ('Alvin','alvinator@gmail.com','1993-05-13','Blk 30 Clementi Street 25, #05-44','482c811da5d5b4bc6d497ffa98491e38','ACTIVE');
insert into users values ('Gabriel','gabbi@hotmail.com','1900-05-21','Blk 28 Serangoon Gardens Street 88, #10-29','482c811da5d5b4bc6d497ffa98491e38','DEACTIVATED');
insert into users values ('Susan','susie@gmail.com','1930-11-15','3 Bukit Ho Swee Garden','482c811da5d5b4bc6d497ffa98491e38','ACTIVE');
insert into users values ('Michelle','michelleng@nus.edu.sg','1931-05-16','6 Mandai Point','482c811da5d5b4bc6d497ffa98491e38','ACTIVE');
insert into users values ('Elizabeth','elle093@gmail.com','1993-05-17','Blk 46 Lorong 14 Clementi, #07-11','482c811da5d5b4bc6d497ffa98491e38','ACTIVE');
insert into users values ('Thomas','tommytrain@yahoo.com.sg','1996-05-18','Blk 387 Lorong 4 Bedok, #04-10','482c811da5d5b4bc6d497ffa98491e38','DEACTIVATED');
insert into users values ('Benjamin','benz10@zmail.com','1123-02-19','77 Jalan Chempaka Kuning','482c811da5d5b4bc6d497ffa98491e38','ACTIVE');
insert into users values ('Jonathan','jonnyboy@zmail.com','1993-05-20','Blk 141 Jurong Central Street 81, #02-04','482c811da5d5b4bc6d497ffa98491e38','DEACTIVATED');
insert into users values ('Dennis','dennyboy@ymail.com','1993-05-21','Blk 45 Kallang Street 20, #14-21','482c811da5d5b4bc6d497ffa98491e38','ACTIVE');
insert into users values ('Rachel','racccoon@gmail.com','1993-05-22','6 Paya Lebar Vista, #18-11','482c811da5d5b4bc6d497ffa98491e38','DEACTIVATED');
insert into users values ('Katherine','kittykat111@dogmail.com','1993-05-23','8 Punggol Lane, #18-14','482c811da5d5b4bc6d497ffa98491e38','ACTIVE');
insert into users values ('Robert','robert234@nus.edu.sg','1993-05-24','5 Cheng San Hill, #07-43','482c811da5d5b4bc6d497ffa98491e38','ACTIVE');
insert into users values ('Alvan','allllllmight@anime.com','1993-05-25','12 Rochor Circle','482c811da5d5b4bc6d497ffa98491e38','ACTIVE');
insert into users values ('Eliza','sevendeadlysins@anime.com','1993-05-26','13 Jurong West Terrace','482c811da5d5b4bc6d497ffa98491e38','DEACTIVATED');
insert into users values ('John','jonnyboy123@zmail.com','1993-05-27','9 Pasir Ris Walk','482c811da5d5b4bc6d497ffa98491e38','ACTIVE');
insert into users values ('Jonathan','jonathanclone@clone.com','1993-05-28','Blk 139 Sengkang Street 70, #06-09','482c811da5d5b4bc6d497ffa98491e38','ACTIVE');
insert into users values ('Thomas','howtotrainyourtrain@movie.com.usa','1993-05-29','6 Joo Koon Green','482c811da5d5b4bc6d497ffa98491e38','ACTIVE');
insert into users values ('Jon','doe@doe.com','1993-05-1','Blk 41 Marine Parade Street 87, #06-42','482c811da5d5b4bc6d497ffa98491e38','ACTIVE');
insert into users values ('Jonas','singalion@lioncity.com','1974-04-25','Blk 45 Marine Parade Street 01, #05-55','482c811da5d5b4bc6d497ffa98491e38','DEACTIVATED');