CREATE TABLE artist (
  artist_id SERIAL NOT NULL PRIMARY KEY,
  display_name VARCHAR(30) NOT NULL,
  password VARCHAR(30) NOT NULL
);

CREATE TABLE song (
  song_id SERIAL NOT NULL PRIMARY KEY,
  title VARCHAR(80) NOT NULL,
  artist_id INT NOT NULL REFERENCES artist(artist_id),
  special VARCHAR(30)
);

CREATE TABLE fan (
  user_id SERIAL NOT NULL PRIMARY KEY,
  user_name VARCHAR(30) NOT NULL,
  password VARCHAR(30) NOT NULL
);

CREATE TABLE setlist (
  setlist_id SERIAL NOT NULL PRIMARY KEY,
  artist_id INT NOT NULL REFERENCES artist(artist_id)
);

CREATE TABLE show (
  show_id SERIAL NOT NULL PRIMARY KEY,
  artist_id INT NOT NULL REFERENCES artist(artist_id),
  city VARCHAR(20) NOT NULL,
  state VARCHAR(20) NOT NULL,
  country VARCHAR(20) NOT NULL,
  show_date date,
  setlist_id INT NOT NULL REFERENCES setlist(setlist_id)
);

CREATE TABLE master_songlist (
  songlist_id SERIAL NOT NULL PRIMARY KEY,
  artist_id INT NOT NULL REFERENCES artist(artist_id)
);

CREATE TABLE bandlist (
  bandlist_id SERIAL NOT NULL PRIMARY KEY,
  user_id INT NOT NULL REFERENCES fan(user_id)
);

CREATE TABLE fanlist (
  fanlist_id SERIAL NOT NULL PRIMARY KEY,
  artist_id INT NOT NULL REFERENCES artist(artist_id)
);
