CREATE TABLE roles(
    idRole INT NOT NULL AUTO_INCREMENT,
    libelle VARCHAR(20) NOT NULL,
    PRIMARY KEY(idRole)
);

CREATE TABLE users(
    idUser INT NOT NULL AUTO_INCREMENT,
    login VARCHAR(120) NOT NULL,
    password VARCHAR(120) NOT NULL,
    email VARCHAR(250) NOT NULL,
    idRole INT NOT NULL DEFAULT 2,
    PRIMARY KEY(idUser),
    FOREIGN KEY(idRole) REFERENCES roles(idRole)
);

CREATE TABLE articles(
    idArticle INT NOT NULL AUTO_INCREMENT,
    titre VARCHAR(255) NOT NULL,
    description TEXT,
    dateAjout DATETIME DEFAULT CURRENT_TIMESTAMP,
    idUser INT NOT NULL,
    PRIMARY KEY(idArticle),
    FOREIGN KEY(idUser) REFERENCES users(idUser)
);

CREATE TABLE podcasts(
    idPodcast INT NOT NULL AUTO_INCREMENT,
    titre VARCHAR(255) NOT NULL,
    description TEXT,
    dateAjout DATETIME DEFAULT CURRENT_TIMESTAMP,
    idUser INT NOT NULL,
    PRIMARY KEY(idPodcast),
    FOREIGN KEY(idUser) REFERENCES users(idUser)
);

CREATE TABLE medias(
    idMedia INT NOT NULL AUTO_INCREMENT,
    image VARCHAR(1024) NULL,
    audio VARCHAR(1024) NULL,
    video VARCHAR(1024) NULL,
    idArticle INT NULL,
    idPodcast INT NULL,
    PRIMARY KEY(idMedia),
    FOREIGN KEY(idArticle) REFERENCES articles(idArticle),
    FOREIGN KEY(idPodcast) REFERENCES podcasts(idPodcast)
);

INSERT INTO roles (libelle) VALUES ('admin');
INSERT INTO roles (libelle) VALUES ('user');