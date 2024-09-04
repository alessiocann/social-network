CREATE TABLE utente(
    nomeUtente VARCHAR(50) PRIMARY KEY,
    nome VARCHAR(50),
    cognome VARCHAR(50),
    email VARCHAR(50),
    password VARCHAR(50),
    immagine VARCHAR(255)
);


CREATE TABLE post(
    ID INTEGER AUTO_INCREMENT,
    titolo VARCHAR(255),
    dataPost DATETIME,
    URL VARCHAR(255),
    nomeUtente VARCHAR(50),
    index idx_nomeUtente(nomeUtente),
    FOREIGN KEY(nomeUtente) REFERENCES utente(nomeUtente),
    PRIMARY KEY(ID)
);

CREATE TABLE likes(
    postID INTEGER,
    nomeUtente VARCHAR(50),
    index idx_postID(postID),
    index idx_nomeUtente(nomeUtente),
    FOREIGN KEY (postID) REFERENCES post(ID),
    FOREIGN KEY (nomeUtente) REFERENCES utente(nomeUtente),
    PRIMARY KEY(postID, nomeUtente)
);

CREATE TABLE follower(
    seguace VARCHAR(50),
    seguito VARCHAR(50),
    index idx_seguace(seguace),
    index idx_seguito(seguito),
    FOREIGN KEY (seguace) REFERENCES utente(nomeUtente),
    FOREIGN KEY (seguito) REFERENCES utente(nomeUtente),
    PRIMARY KEY(seguace, seguito)
);

