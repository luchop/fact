create table diario(
   CodDiario int NOT NULL primary key auto_increment,
   Nombre varchar(50),
   NombreCorto varchar(5)
) ENGINE = InnoDB DEFAULT CHARACTER SET = utf8;

create table cuenta(
   CodCuenta int NOT NULL primary key auto_increment,
   Codigo varchar(20) not null,
   Nombre varchar(100) not null,
   Grupo char(1),
   Nivel tinyInt,
   CodMayor int not null,
   Subcuentas tinyInt default 0,
   Orden smallInt default 0,
   Activo tinyInt default 1
) ENGINE = InnoDB DEFAULT CHARACTER SET = utf8;

create table asientom(
   CodAsiento int NOT NULL primary key auto_increment,
   CodDiario int not null,
   Numero int not null,
   Fecha date not null,
   Referencia varchar(15),
   Glosa varchar(255), 
   CodUsuario int not null,
   Anulado tinyInt default 0,
   INDEX fk_asientom_idx (CodDiario ASC),
   CONSTRAINT fk_asientom
    FOREIGN KEY (CodDiario) REFERENCES diario(CodDiario)
    ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB DEFAULT CHARACTER SET = utf8;

create table asientod(
   CodAsiento int NOT NULL,
   CodCuenta int not null,
   Glosa varchar(50),
   Debito decimal(10,2) default 0,
   Credito decimal(10,2) default 0,
   Orden smallInt,
   INDEX fk_asientod_idx (CodCuenta ASC),
   CONSTRAINT fk_asientod
    FOREIGN KEY (CodCuenta) REFERENCES cuenta(CodCuenta)
    ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB DEFAULT CHARACTER SET = utf8;

CREATE TABLE permiso (
  CodUsuario int not null,
  Opcion int not null,
  primary key(CodUsuario, Opcion)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ;

CREATE TABLE usuario(
  CodUsuario INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  Nombre VARCHAR(60) NOT NULL,
  Correo VARCHAR(70) NOT NULL,
  NombreUsuario VARCHAR(15) NOT NULL,
  Telefono VARCHAR(25) NOT NULL,
  Clave VARCHAR(128) NOT NULL,
  Sal VARCHAR(5) NOT NULL,
  Activo TINYINT DEFAULT 1
) ENGINE = INNODB DEFAULT CHARACTER SET = utf8;

CREATE TABLE persona(
   CodPersona INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
   Nombre VARCHAR(70),
   Contacto VARCHAR(70),
   Direccion VARCHAR(150),
   Zona VARCHAR(20),
   Ciudad VARCHAR(20),
   Telefono VARCHAR(25),
   Correo VARCHAR(70),
   Identificacion VARCHAR(15),
   Notas VARCHAR(255),
   Activo TINYINT DEFAULT 1
) ENGINE = INNODB DEFAULT CHARACTER SET = utf8;

CREATE TABLE banco(
   CodBanco INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
   Nombre VARCHAR(50)
) ENGINE = INNODB DEFAULT CHARACTER SET = utf8;

CREATE TABLE actividad_economica(
   CodActividadEconomica INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
   Nombre VARCHAR(50)
) ENGINE = INNODB DEFAULT CHARACTER SET = utf8;

CREATE TABLE cliente(
   CodPersona INTEGER NOT NULL PRIMARY KEY,
   CodActividadEconomica INTEGER NOT NULL,
   LimiteCredito numeric(10,2),
   INDEX fk_cliente_idx (CodActividadEconomica ASC),
   CONSTRAINT fk_cliente
    FOREIGN KEY (CodActividadEconomica) REFERENCES actividad_economica(CodActividadEconomica)
    ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = INNODB DEFAULT CHARACTER SET = utf8;

create table parametro(
  Codigo varchar(20) NOT NULL PRIMARY KEY,
  Numero int DEFAULT -1,
  Cadena varchar(100) DEFAULT '' 
) ENGINE = InnoDB DEFAULT CHARACTER SET = utf8;


