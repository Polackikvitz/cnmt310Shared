    
Set @startTime = now();
Set @endTime = now();
    
    Select stack.name, song.title, artist.name,
		albumn.name, label.name
    from played, stack, song, artist, albumn, label
    where played.stackID = stack.id AND played.songID = song.id AND song.albumnID = albumn.id AND 
		albumn.labelID = label.id AND song.artistID = artist.id AND played.time between startTime and endTime
	ORDER BY played.time asc;
