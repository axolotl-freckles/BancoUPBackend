
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
	id_sender      integer(10)  NOT NULL REFERENCES BancoUP.users(id_user),
	id_receiver    integer(10)  NOT NULL REFERENCES BancoUP.users(id_user),
	concept        varchar(255),
	amount         decimal(8,2) NOT NULL,
	status         varchar(128) NOT NULL,
	date           datetime     NOT NULL,
	type           varchar(128) NOT NULL
) ENGINE = InnoDB;
-- ALTER TABLE BancoUP.transactions
-- 	ADD CONSTRAINT `fk_updb_trans_sender`
-- 		FOREIGN KEY (id_sender) REFERENCES BancoUP.users(id_user)
-- 		ON DELETE CASCADE
-- 		ON UPDATE RESTRICT;
-- ALTER TABLE BancoUP.transactions
-- 	ADD CONSTRAINT `fk_updb_trans_receiver`
-- 		FOREIGN KEY (id_receiver) REFERENCES BancoUP.users(id_user)
-- 		ON DELETE CASCADE
-- 		ON UPDATE RESTRICT;
