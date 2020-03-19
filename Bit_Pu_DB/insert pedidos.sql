USE [Bit_Pur_DB]
GO

INSERT INTO [Bit_Pur_Clientes_Servicios_Usuario]
           ([id_cliente]
           ,[id_tipo]
           ,[cantidad]
           ,[hora_pedido]
           ,[fecha_pedido]
           ,[hora_entrega]
           ,[fecha_entrega]
           ,[id_usuario])
     VALUES
           ('1'
           ,'1'
           ,'5'
           ,'09:00:00'
           ,'2020-02-11'
           ,''
           ,'0001-01-01'
           ,'5'),
		   ('1'
           ,'2'
           ,'5'
           ,'09:30:00'
           ,'2020-02-11'
           ,''
           ,'0001-01-01'
           ,'6')
GO

USE [Bit_Pur_DB]
GO
SELECT * FROM [Bit_Pur_Clientes_Servicios_Usuario]
GO

USE [Bit_Pur_DB]
GO
DELETE FROM [Bit_Pur_Clientes_Servicios_Usuario]
GO