
DROP TABLE IF EXISTS BancoUP.users;
CREATE TABLE BancoUP.users (
	id_user       integer(10) ZEROFILL AUTO_INCREMENT NOT NULL PRIMARY KEY,
	username      varchar(128) NOT NULL,
	fullname      varchar(128) NOT NULL,
	balance       decimal(8,2),
	password_hash varchar(255) NOT NULL
) ENGINE = InnoDB;

DROP TABLE IF EXISTS BancoUP.transactions;
CREATE TABLE BancoUP.transactions (
	id_transaction integer(10) ZEROFILL AUTO_INCREMENT NOT NULL PRIMARY KEY,
	id_sender      integer(10) ZEROFILL NOT NULL REFERENCES BancoUP.users(id_user),
	id_receiver    integer(10) ZEROFILL NOT NULL REFERENCES BancoUP.users(id_user),
	concept        varchar(255),
	amount         decimal(8,2) NOT NULL,
	status         varchar(128) NOT NULL,
	date           datetime     NOT NULL,
	type           varchar(128) NOT NULL
) ENGINE = InnoDB;

DROP USER IF EXISTS 'remoteUser';
FLUSH PRIVILEGES;
CREATE USER 'remoteUser'@'%' IDENTIFIED BY '1needHlpPlz';
GRANT SELECT ON BancoUP.* to 'remoteUser'@'%';
GRANT INSERT ON BancoUP.* to 'remoteUser'@'%';
FLUSH PRIVILEGES;

INSERT INTO BancoUP.users (username, fullname, balance, password_hash) VALUES
('usuario1', 'Jorge Pedroza', 600.0, '$2a$04$yYnkP7dydGdmYr4A1P49nue/DOqsdNW2Ox3pQDw3d8Aba4QSgyxe.');
INSERT INTO BancoUP.users (username, fullname, balance, password_hash) VALUES
('usuario2', 'Jose Pedroza', 700.0, '$2a$04$qjDdpbJ8ZctDuKT7AV4Q/uPQrvsliK3ZhQo7WnltLfdPwdmqGJEB.');

INSERT INTO BancoUP.transactions (id_sender, id_receiver, concept, amount, status, date, type) VALUES
(1, 2, 'test 1', 100.0, 'ACCEPTED', '2024-06-04', 'TRANSFER');
INSERT INTO BancoUP.transactions (id_sender, id_receiver, concept, amount, status, date, type) VALUES
(2, 1, 'test 2', 200.0, 'ACCEPTED', '2024-06-04', 'TRANSFER');

