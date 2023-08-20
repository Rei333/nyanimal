DROP TABLE IF EXISTS users;

CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    pseudo VARCHAR(255) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    mail VARCHAR(255) UNIQUE NOT NULL,
    money INT NOT NULL DEFAULT 500,

    -- NYANIMAL
    satiety INT NOT NULL DEFAULT 100,
    energy INT NOT NULL DEFAULT 100,
    hapiness INT NOT NULL DEFAULT 100,
    health INT NOT NULL DEFAULT 100,

    -- HOUSE
    bedroom BOOL NOT NULL DEFAULT false
);

INSERT INTO users (pseudo, password, mail) VALUES ("test", "$2y$10$xmbmoDaIkOxEo27KZR.ike5x2MqeNtV2HOOsUppsxvj2ya3jVCBBS", "test@gmail.com");