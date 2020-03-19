USE [Bit_Pur_DB]
GO

CREATE TABLE Bit_Pur_Recordatorios(
	[id_recordatorio] [int] NOT NULL PRIMARY KEY Identity,
	[texto] [varchar](50) NOT NULL,
	[fecha] [varchar](50) NOT NULL,
	[hora] [time] NOT NULL,
	[id_usuario] [int] NOT NULL)

GO

CREATE TABLE Bit_Pur_Provedores(
	[id_provevedor] [int] NOT NULL PRIMARY KEY Identity,
	[nombre_pro] [varchar](50) NOT NULL,
	[telefono_pro] [varchar](50) NOT NULL,
	[direccion] [varchar](50) NOT NULL,
	[e_mail] [varchar](50) NOT NULL)
GO

CREATE TABLE Bit_Pur_Inventario(
	[id_objeto] [int] NOT NULL PRIMARY KEY Identity,
	[nombre_obj] [varchar](50) NOT NULL,
	[cantidad] [varchar](50) NOT NULL,
	[precio] [float] NOT NULL)
GO

CREATE TABLE Bit_Pur_Inventario_provedor(
	[id_objeto] [int] NOT NULL,
	[id_provevedor] [int] NOT NULL,
	[cantidad] [varchar](50) NOT NULL)
GO

CREATE TABLE Bit_Pur_Ventas(
	[id_venta] [int] NOT NULL PRIMARY KEY Identity,
	[id_usuario] [int] NOT NULL,
	[total] [float] NOT NULL)
GO

CREATE TABLE Bit_Pur_Ventas_inventario(
	[id_venta] [int] NOT NULL,
	[id_objeto] [int] NOT NULL,
	[cantidad] [int] NOT NULL,
	[subtotal] [float] NOT NULL)
GO

CREATE TABLE Bit_Pur_Usuarios(
	[id_usuario] [int] NOT NULL PRIMARY KEY Identity,
	[nombre_usu] [varchar](50) NOT NULL,
	[usuario] [varchar](50) NOT NULL,
	[contrasena] [varchar](50) NOT NULL,
	[telefono_usu] [varchar](50) NOT NULL,
	[e_mail] [varchar](50) NOT NULL,
	[ruta_u] [varchar](50) NOT NULL,
	[id_tipo] [int] NOT NULL)
GO

CREATE TABLE Bit_Pur_Tipo_Usuario(
	[id_tipo] [int] NOT NULL,
	[nombre_tipo] [varchar](50) NOT NULL)
GO

CREATE TABLE Bit_Pur_Clientes(
	[id_cliente] [int] NOT NULL PRIMARY KEY Identity,
	[id_vendedor] [int] NOT NULL,
	[lugar] [varchar](50) NOT NULL,
	[fecha_c] [date] NOT NULL,
	[ruta_c] [varchar] (50) NOT NULL,
	[nom_est] [varchar] (50) NOT NULL,
	[nom_pro] [varchar] (50) NOT NULL,
	[giro] [varchar](50) NOT NULL,
	[frecuencia] [varchar](50) NOT NULL,
	[dispensadores] [varchar](50) NOT NULL,
	[garafones] [varchar](50) NOT NULL,
	[exhibidores] [varchar](50) NOT NULL,
	[portagarafones] [varchar](50) NOT NULL,
	[costo_por_destruccion] [float] NOT NULL,
	[domicilio] [varchar](50) NOT NULL,
	[calle1] [varchar](50) NOT NULL,
	[calle2] [varchar](50) NOT NULL,
	[calle3] [varchar](50) NOT NULL,
	[colonia] [varchar](50) NOT NULL,
	[cp] [varchar](50) NOT NULL,
	[telefono_cli] [varchar](50) NOT NULL)
GO

CREATE TABLE Bit_Pur_Tipo_Pedido(
	[id_tipo] [int] NOT NULL PRIMARY KEY Identity,
	[tipo][varchar](50) NOT NULL)
GO

CREATE TABLE Bit_Pur_Clientes_Servicios_Usuario(
	[id_servicio] [int] NOT NULL PRIMARY KEY Identity,
	[id_cliente] [int] NOT NULL,
	[id_tipo] [int] NOT NULL,
	[cantidad] [int] NOT NULL,
	[hora_pedido] [time] NOT NULL,
	[fecha_pedido] [date] NOT NULL,
	[hora_entrega] [time] NOT NULL,
	[fecha_entrega] [date] NOT NULL,
	[id_usuario] [int] NOT NULL)
GO