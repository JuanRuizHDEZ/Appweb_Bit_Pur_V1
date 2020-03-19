USE [Bit_Pur_DB]
GO

INSERT INTO [dbo].[Bit_Pur_Usuarios]
           ([nombre_usu]
           ,[usuario]
           ,[contrasena]
           ,[telefono_usu]
           ,[e_mail]
		   ,[ruta_u]
           ,[id_tipo])
     VALUES
           ('juan antonio ruiz hernandez'
           ,'juno'
		   ,'juno'
           ,9191174346
		   ,'juantono_halo96@hotmail.com'
		   ,''
           ,1),
		   ('oscar ruiz hernandez'
           ,'oscar'
		   ,'oscar'
           ,9191170110
		   ,'osruhe_96@hotmail.com'
		   ,''
           ,2)
GO

select * from [Bit_Pur_Usuarios]
GO

DELETE FROM [Bit_Pur_Usuarios]
GO