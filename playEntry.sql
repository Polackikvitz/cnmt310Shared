Set songName = '';
Set albumnName = '';
Set artistName = '' ;
Set labelName = '';
Set playTime = now();
Set djsID = '';

-- if exists song
Select *
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
	And label.name = labelName;
-- else
	-- if exists artist
    Select *
		From artist
		Where artist.name = artistName;
    -- else add artist
    Insert Into artist(name) Values (artistName);
	-- if exists albumn
    Select *
		From albumn
		Join label
		On albumn.labelID = label.id
		Where albumn.name = albumnName
		And label.name = labelName;
    -- else 
		-- if exists label
			Select *
			From label
			Where label.name = labelName;
                    -- else add label
        Insert Into label(name) Values (labelName);
	-- add albumn
    set albumnLabelID = 0;
    Insert Into albumn(name, labelID) Values (albumnName, albumnLabelID);
-- add song
Set songArtistID = 0;
Set songAlbumnID = 0;
Insert Into song(title, artistID, albumnID)  Values (songName, songArtistID, songAlbumnID);

-- insert into playlist
Set playStackID = 0;
Insert Into played(songID, time, stackID, djID) Values(songName, playTime, playStackID, djsID);