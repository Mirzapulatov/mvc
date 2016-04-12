/* ************* Connections Data Base ************* */
Create file "DB.php" in dir config/ with the contents

<?php
$host = "localhost"; // Host
$dbuser = "postgres"; //Data Base User
$dbpass = "123456"; //Data Base Password
$dbname = "test"; //Data Base Name

/* ************* Table for data base ************* */

CREATE TABLE blog
(
  id serial NOT NULL,
  title text NOT NULL,
  text text NOT NULL,
  "time" integer NOT NULL,
  views integer DEFAULT 0,
  author character(200)
)
WITH (
  OIDS=FALSE
);
ALTER TABLE blog
  OWNER TO postgres;

CREATE TABLE blog_comments
(
    id serial NOT NULL,
    name character(255) NOT NULL,
    message text NOT NULL,
    id_blog integer,
    "time" integer
)
  WITH (
    OIDS=FALSE
  );
  ALTER TABLE blog_comments
    OWNER TO postgres;

CREATE TABLE contacts
(
  id serial NOT NULL,
  name character(255) NOT NULL,
  email character(255) NOT NULL,
  site character(255) NOT NULL,
  message text NOT NULL,
  "time" integer
)
WITH (
  OIDS=FALSE
);
ALTER TABLE contacts
  OWNER TO postgres;

CREATE TABLE news
(
  id serial NOT NULL,
  title text NOT NULL,
  text text NOT NULL,
  "time" integer NOT NULL,
  views integer DEFAULT 0,
  CONSTRAINT news_pkey PRIMARY KEY (id)
)
WITH (
  OIDS=FALSE
);
ALTER TABLE news
  OWNER TO postgres;


