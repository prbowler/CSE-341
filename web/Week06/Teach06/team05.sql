CREATE TABLE Scriptures
(
    id      SERIAL PRIMARY KEY,
    book    VARCHAR(100)  NOT NULL,
    chapter INT           NOT NULL,
    verse   INT           NOT NULL,
    content VARCHAR(1000) NOT NULL
);

INSERT INTO Scriptures (book, chapter, verse, content)
VALUES ('John',
        1,
        5,
        'And the light shineth in darkness; and the darkness comprehended it not.');
INSERT INTO Scriptures (book, chapter, verse, content)
VALUES ('Doctrine and Covenants',
        88,
        49,
        'The light shineth in darkness, and the darkness comprehendeth it not; nevertheless, the day shall come when ' ||
        'you shall comprehend even God, being quickened in him and by him.');

INSERT INTO Scriptures (book, chapter, verse, content)
VALUES ('Doctrine and Covenants',
        93,
        28,
        'He that keepeth his commandments receiveth truth and light, until he is glorified in truth and knoweth all things.');

INSERT INTO Scriptures (book, chapter, verse, content)
VALUES ('Mosiah',
        16,
        9,
        'He is the light and the life of the world; yea, a light that is endless, that can never be darkened; yea, ' ||
        'and also a life which is endless, that there can be no more death.');

create table topics
(
    id   serial primary key,
    name varchar(80)
);
create table scripture_topics
(
    id          serial primary key,
    scriptureId int references scriptures (id),
    topicsId    int references topics (id)
);
INSERT INTO topics (name)
VALUES ('Faith'), ('Hope'), ('Charity');

SElECT t.name FROM Scriptures as s JOIN scripture_topics as st on s.id = st.scriptureId JOIN topics as t on st.topicsId = t.id;