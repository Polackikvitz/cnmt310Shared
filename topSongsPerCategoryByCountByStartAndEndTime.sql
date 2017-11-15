delimiter //
-- Drop procedure if exists `playEntry`//
Create Procedure topSongs
	(In startTime datetime,
    In endTime datetime,
    In resultCount int)
    Begin
    
    Select *
    from played;

	End//
delimiter ;
        