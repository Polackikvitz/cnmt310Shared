delimiter //
-- Drop procedure if exists `playEntry`//
Create Procedure playEntry
	(IN songName varchar(255),
    IN albumnName varchar(255),
    IN artistName varchar(255),
    IN labelName varchar(255),
    IN playTime datetime,
    IN djID varchar(255))
    Begin
	With subq as(
		Select song.id as songID, stack.id as stackID, 
        From  song 
        Join albumn
        On song.albumnID = albumn.id
        Join artist
        On song.artistID = artist.id
        Join label
        On albumn.labelID = label.id
        Where song.name = titleName
        And albumn.name = albumnName
        And artist.name = artistName
        And label.name = labelName)
	Select * From subq;
    Insert Into played (songID, playTime, djID, stackID)
    Values (subq.songID, playTime, djID, subq.stackID);
	End//
delimiter ;
        