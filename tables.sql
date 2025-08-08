CREATE TABLE USERS (
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    admin BOOLEAN DEFAULT FALSE,
    PRIMARY KEY (username)
);

CREATE TABLE SESSIONS (
    username VARCHAR(50) NOT NULL,
    token VARCHAR(255) PRIMARY KEY,
    expiration_date DATETIME NOT NULL,
    FOREIGN KEY (username) REFERENCES USERS(username)
);