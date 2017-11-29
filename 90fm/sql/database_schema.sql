CREATE TABLE Song (
id int not null auto_increment,
title varchar(255) not null,
albumID int not null,
artistID int not null,

primary key (id)
);

Create Table Artist (
id int not null auto_increment,
name varchar(255) not null,

primary key (id)
);

Create Table Album (
id int not null auto_increment,
name varchar(255) not null,
labelID int not null,

primary key (id)
);

Create Table Label (
id int not null auto_increment,
name varchar(255) not null,

primary key (id)
);

Create Table Stack (
id int not null auto_increment,
name varchar(255) not null,

primary key (id)
);

Create Table Played (
songID int not null,
time datetime not null,
stackID int not null,
djID int not null,

primary key (songID, time)
);

Create Table User (
id int not null auto_increment,
name varchar(255) not null,
password varchar(255) not null,

primary key (id)
);

Create Table User_Profile(
userID int not null,
permissionID int not null,

primary key (userID,permissionID)
);

Create Table Permission_Profile(
id int not null auto_increment,
permissions varchar(255) not null,

primary key (id)
);

Alter Table Song
Add constraint nk_Song Unique Key (title, albumID, artistID),
Add constraint fk_AlbumID Foreign Key (albumID) references Album(id),
Add constraint fk_ArtistID Foreign Key (artistID) references Artist(id);

Alter Table Album
Add constraint fk_labelID Foreign Key (labelID) references Label(id);

Alter Table Played
Add constraint fk_SongID Foreign Key (songID) references Song(id),
Add constraint fk_UserID Foreign Key (djID) references User(id),
Add constraint fk_StackID Foreign Key (stackID) references Stack(id);

Alter Table User_Profile
Add constraint fk_UserID_Profile Foreign Key (userID) references User(id),
Add constraint fk_PermissionProfileID Foreign Key (permissionID) references Permission_Profile(id);
