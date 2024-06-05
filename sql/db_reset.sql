-- Elimina la tabla 'users' en la base de datos 'BancoUP' si existe
DROP TABLE IF EXISTS BancoUP.users;

-- Crea la tabla 'users' en la base de datos 'BancoUP'
CREATE TABLE BancoUP.users (
    id_user       integer(10) ZEROFILL AUTO_INCREMENT NOT NULL PRIMARY KEY,  -- Campo de identificador de usuario, con auto-incremento y relleno con ceros
    username      varchar(128) NOT NULL,                                      -- Nombre de usuario, no puede ser nulo
    fullname      varchar(128) NOT NULL,                                      -- Nombre completo del usuario, no puede ser nulo
    balance       decimal(8,2),                                               -- Saldo del usuario, con 8 dígitos en total y 2 decimales
    password_hash varchar(255) NOT NULL                                       -- Hash de la contraseña del usuario, no puede ser nulo
) ENGINE = InnoDB;                                                            -- Utiliza el motor de almacenamiento InnoDB

-- Elimina la tabla 'transactions' en la base de datos 'BancoUP' si existe
DROP TABLE IF EXISTS BancoUP.transactions;

-- Crea la tabla 'transactions' en la base de datos 'BancoUP'
CREATE TABLE BancoUP.transactions (
    id_transaction integer(10) ZEROFILL AUTO_INCREMENT NOT NULL PRIMARY KEY,  -- Campo de identificador de transacción, con auto-incremento y relleno con ceros
    id_sender      integer(10)  NOT NULL REFERENCES BancoUP.users(id_user),   -- Identificador del usuario que envía, referencia a 'id_user' en 'users'
    id_receiver    integer(10)  NOT NULL REFERENCES BancoUP.users(id_user),   -- Identificador del usuario que recibe, referencia a 'id_user' en 'users'
    concept        varchar(255),                                              -- Concepto de la transacción, puede ser nulo
    amount         decimal(8,2) NOT NULL,                                     -- Monto de la transacción, con 8 dígitos en total y 2 decimales, no puede ser nulo
    status         varchar(128) NOT NULL,                                     -- Estado de la transacción, no puede ser nulo
    date           datetime     NOT NULL,                                     -- Fecha y hora de la transacción, no puede ser nulo
    type           varchar(128) NOT NULL                                      -- Tipo de transacción, no puede ser nulo
) ENGINE = InnoDB;                                                            -- Utiliza el motor de almacenamiento InnoDB

-- Los siguientes comandos ALTER TABLE están comentados y se utilizan para agregar restricciones de clave foránea
-- ALTER TABLE BancoUP.transactions
-- 	ADD CONSTRAINT `fk_updb_trans_sender`
-- 		FOREIGN KEY (id_sender) REFERENCES BancoUP.users(id_user)
-- 		ON DELETE CASCADE                                        -- Elimina las transacciones si el usuario remitente se elimina
-- 		ON UPDATE RESTRICT;                                      -- Restringe la actualización de la clave foránea
-- ALTER TABLE BancoUP.transactions
-- 	ADD CONSTRAINT `fk_updb_trans_receiver`
-- 		FOREIGN KEY (id_receiver) REFERENCES BancoUP.users(id_user)
-- 		ON DELETE CASCADE                                        -- Elimina las transacciones si el usuario receptor se elimina
-- 		ON UPDATE RESTRICT;                                      -- Restringe la actualización de la clave foránea
