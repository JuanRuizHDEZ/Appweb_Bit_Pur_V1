USE [Bit_Pur_DB]
GO

SELECT [id_usuario]
      ,[nombre]
      ,[contrasena]
  FROM [Bit_Pur_Usuarios]
GO

INSERT INTO [dbo].[Bit_Pur_Usuarios]
           ([nombre]
           ,[contrasena]
		   ,[tipo])
     VALUES
           ('juan'
           ,'juan'
		   ,'admin')
GO