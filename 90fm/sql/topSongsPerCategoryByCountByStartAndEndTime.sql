/*delimiter //
Drop procedure if exists `topSongs`//
Create Procedure topSongs
	(In startTime datetime,
    In endTime datetime,
    In resultCount int)
    Begin
    
    Select *
    from played;

	End//
delimiter ;*/


/*top ten */
Select Songs.title, Artist.name, numPlays.countPlay
from Songs, Artist, Played, 
	(Select  Songs.title, Count(Played.songID) AS countPlay
    From Songs, Played
    WHERE Played.time between adddate(now(),-7) and now() AND Songs.id = Played.songID
    Group By Songs.title) numPlays
where Played.songID = Songs.ID AND Songs.artistID = Artist.id 
	AND Songs.title = numPlays.title
order by numPlays.countPlay DESC
limit 10;


/*top five*/
Select Songs.title, Artist.name, numPlays.countPlay
from Songs, Artist, Played, 
	(Select  Songs.title, Count(Played.songID) AS countPlay
    From Songs, Played
    WHERE Played.time between adddate(now(),-7) and now() AND Songs.id = Played.songID
		AND Played.stackID = $txt
    Group By Songs.title) numPlays
where Played.songID = Songs.ID AND Songs.artistID = Artist.id 
	AND Songs.title = numPlays.title
order by numPlays.countPlay DESC
limit 5;

        