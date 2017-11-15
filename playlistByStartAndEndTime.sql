/*delimiter //
Drop procedure if exists `playlist`//
Create Procedure playlist
	(In startTime datetime,
    In endTime datetime)
    Begin
    
    Select * 
    from played;

	End//
delimiter ;
    Call playlist(now(), now());    
  */  
    
Set @startTime = now();
Set @endTime = now();
    
    Select * 
    from played;
