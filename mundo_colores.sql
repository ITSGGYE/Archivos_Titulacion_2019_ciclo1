create database mundo_colores;
use mundo_colores;
SET SQL_SAFE_UPDATES = 0;


create table curso(
id_curso int not null auto_increment,
nombre_Curso varchar(30) not null,
estado_Curso char(1) not null,
primary key(id_curso));


 create table curso_alumno(
 id_curso_alumno int not null auto_increment,
 fk_alumno int not null,
 fk_curso int not null,
 fk_anio smallint not null,
 estado char(2),
 foreign key (fk_alumno) references alumno(id_alumno),
 foreign key (fk_curso) references curso(id_curso),
 foreign key (fk_anio) references aniolectivo(id_aniolectivo),
 primary key (id_curso_alumno));

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

create table usuarios (
id_usuario int(4) unsigned zerofill not null auto_increment,
fk_profesor int not null,
usuario varchar(20) not null,
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
fechanac_alumno date,
nacionalidad_alumno varchar(10) not null ,
cedula_alumno varchar(10)  null ,
nescuela_alumno varchar(100) not null ,
imagen_alumno int not null,
emg_alumno varchar(2) not null,
telf_alumno varchar (12) not null,
direc_alumno varchar(100) not null,
docum_alumno varchar(2) not null,
cond_alumno varchar(2) not null,
obser_alumno varchar(200) not null,
fechareg_alumno date,
primary key (id_alumno));


create table datos_familiares(
id_datosfamiliares int not null auto_increment,
fk_alumno int not null,
nombre_padre varchar(100) not null,
cedula_padre varchar(10) not null,
fecha_padre date,
nacionalidad_padre varchar(50) not null,
estadocivil_padre varchar (2) not null,
email_padre varchar(100) not null,
niveleducacion_padre varchar (100) not null,
ocupacion_padre varchar(100) not null,
restudiante_padre varchar(2) not null,
auto_padre  varchar(2) not null,
celular_padre varchar(10) not null,
nombre_madre varchar(100) not null,
cedula_madre varchar(10) not null,
fecha_madre date,
nacionalidad_madre varchar(50) not null,
estadocivil_madre varchar (2) not null,
email_madre varchar(100) not null,
niveleducacion_madre varchar (100) not null,
ocupacion_madre varchar(100) not null,
restudiante_madre varchar(2) not null,
auto_madre  varchar(2) not null,
celular_madre varchar(10) not null,
fechareg date,
foreign key (fk_alumno) references alumno (id_alumno),
primary key (id_datosfamiliares));

create table datos_representante(
id_datosrepresentante int not null auto_increment,
fk_alumno int not null,
nombre_repre varchar(100) not null,
cedula_repre varchar(10) not null,
fecha_repre date,
nacionalidad_repre varchar(50) not null,
estadocivil_repre varchar (2) not null,
email_repre varchar(100) not null,
niveleducacion_repre varchar (100) not null,
ocupacion_repre varchar(100) not null,
restudiante_repre varchar(2) not null,
auto_repre  varchar(2) not null,
celular_repre varchar(10) not null,
relacionf_repre varchar(2) not null,
fechareg date,
foreign key (fk_alumno) references alumno (id_alumno),
primary key (id_datosrepresentante));

create table pagos_matricula(
id_pago int not null auto_increment,
cliente varchar (200) not null ,
direccion varchar(100) not null,
telefono varchar(10) not null,
ruc varchar(13)  not null,
fk_alumno int not null,
pago decimal(4,2) not null,
detalle varchar(150) not null,
fechareg date,
foreign key (fk_alumno) references alumno (id_alumno),
primary key (id_pago));

create table pagos_pensiones(
id_pago int not null auto_increment,
cliente varchar (200) not null ,
direccion varchar(100) not null,
telefono varchar(10) not null,
ruc varchar(13)  not null,
fk_alumno int not null,
tipo int not null,
mes int not null,
pago decimal(4,2) not null,
detalle varchar(150) not null,
fechareg date,
foreign key (fk_alumno) references alumno (id_alumno),
primary key (id_pago));