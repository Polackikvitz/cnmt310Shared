delimiter //
-- Drop procedure if exists `playEntry`//
Create Procedure playlist
	(In startTime datetime,
    In endTime datetime)
    Begin
    
    Select *
    from played;

	End//
delimiter ;
        