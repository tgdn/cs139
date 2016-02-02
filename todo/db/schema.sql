BEGIN;

-- set foreign keys
PRAGMA foreign_keys = ON;

DROP TABLE IF EXISTS user;
DROP TABLE IF EXISTS list;
DROP TABLE IF EXISTS user_list;
DROP TABLE IF EXISTS list_item;
DROP TABLE IF EXISTS category;
DROP TABLE IF EXISTS list_category;

CREATE TABLE user (
    id integer NOT NULL PRIMARY KEY AUTOINCREMENT,
    username varchar(100) NOT NULL,
    full_name varchar(100) NOT NULL,
    email varchar(100) NOT NULL,
    password varchar(250) NOT NULL,
    created_at datetime NOT NULL,
    last_login datetime NOT NULL
);

CREATE TABLE list (
    id integer NOT NULL PRIMARY KEY AUTOINCREMENT,
    name varchar(100) NOT NULL,
    created_at datetime NOT NULL,
    modified_at datetime NOT NULL
);

CREATE TABLE user_list (
    user_id integer NOT NULL,
    list_id integer NOT NULL,

    FOREIGN KEY(user_id) REFERENCES user(id),
    FOREIGN KEY(list_id) REFERENCES list(id)
);

CREATE TABLE list_item (
    id integer NOT NULL PRIMARY KEY AUTOINCREMENT,
    content text,
    completed boolean,
    list_id integer NOT NULL,
    created_at datetime NOT NULL,
    modified_at datetime NOT NULL,

    FOREIGN KEY(list_id) REFERENCES list(id)
);

CREATE TABLE category (
    id integer NOT NULL PRIMARY KEY AUTOINCREMENT,
    name varchar(100) NOT NULL,
    user_id integer NOT NULL,
    created_at datetime NOT NULL,

    FOREIGN KEY(user_id) REFERENCES user(id)
);

CREATE TABLE list_category (
    list_id integer NOT NULL,
    category_id integer NOT NULL,

    FOREIGN KEY(list_id) REFERENCES list(id),
    FOREIGN KEY(category_id) REFERENCES category(id)
);

CREATE INDEX user_userlistindex ON user_list(user_id);
CREATE INDEX list_userlistindex ON user_list(list_id);

CREATE INDEX itemindex ON list_item(list_id);

CREATE INDEX list_listcategoryindex ON list_category(list_id);
CREATE INDEX category_listcategoryindex ON list_category(category_id);

COMMIT;
