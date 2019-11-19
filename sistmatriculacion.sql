create database sistmatriculacion;
use sistmatriculacion;
SET SQL_SAFE_UPDATES = 0;


create table curso(
id_curso int not null auto_increment,
nombre_Curso varchar(30) not null,
estado_Curso char(1) not null,
primary key(id_curso));

create table paralelo(
id_paralelo int not null auto_increment,
nombre_paralelo varchar(30) not null,
estado_paralelo char(1) not null,
primary key(id_paralelo));


create table materia(
id_materia int not null auto_increment,
nombre_materia varchar(100) not null,
estado_materia char(1),
primary key(id_materia));



create table img_profesor(
				id_imagen int auto_increment,
				nombre varchar(500),
				ruta varchar(500),
				fechaSubida date,
				primary key(id_imagen)
					);
                    
create table profesor(
id_profesor int not null auto_increment,
nombre_profesor varchar(100) not null ,
direccion_profesor varchar(100) not null ,
telefono_profesor varchar(10) not null ,
celular_profesor varchar(100) not null ,
cedula_profesor varchar(10) not null ,
email_profesor varchar(100) not null ,
fechanac_profesor date,
titulo_profesor varchar(100) not null ,
genero_profesor char(1) not null ,
imagen_profesor int not null,
fechareg_profesor date,
primary key (id_profesor));

create table aniolectivo(
id_aniolectivo smallint  auto_increment,
anio_lectivo char(12) not null,
estado_aniolectivo char(2),
primary key(id_aniolectivo));


select * from aniolectivo;

create table usuarios (
id_usuario int(4) unsigned zerofill not null auto_increment,
fk_profesor int not null,
usuario varchar(12) not null,
contrasena text(64) not null,
privilegio char(5) not null,
fecha_registro date,
foreign key (fk_profesor) references profesor(id_profesor), 
primary key (id_usuario)
);


create table img_alumno(
				id_imagen int auto_increment,
				nombre varchar(500),
				ruta varchar(500),
				fechaSubida date,
				primary key(id_imagen)
					);
                    
create table alumno(
id_alumno int not null auto_increment,
nombre_alumno varchar(100) not null ,
lugnacimiento_alumno varchar(100) not null ,
fechanac_alumno date,
nacionalidad_alumno varchar(10) not null ,
repite_alumno varchar(2) not null ,
cedula_alumno varchar(10)  null ,
nescuela_alumno varchar(100) not null ,
lescuela_alumno varchar(100) not null ,
imagen_alumno int not null,
npadre_alumno varchar(200) not null ,
opadre_alumno varchar(200) not null ,
nmadre_alumno varchar(200) not null ,
omadre_alumno varchar(200) not null ,
nrepresentante_alumno varchar(200) not null ,
crepresentante_alumno varchar(200) not null,
drepresentante_alumno varchar(200) not null,
trepresentante_alumno varchar(10) not null,
rfamiliar_alumno varchar(200) not null,
fechareg_alumno date,
primary key (id_alumno));

drop table alumno;

select * from alumno;