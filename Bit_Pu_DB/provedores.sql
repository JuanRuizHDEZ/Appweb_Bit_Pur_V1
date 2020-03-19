USE [Bit_Pur_DB]
GO

INSERT INTO [dbo].[Bit_Pur_Provedores]
           ([nombre_pro]
           ,[telefono]
           ,[direccion]
           ,[e_mail])
     VALUES
           ('technoaqua'
           ,'9191233467'
           ,'barrio del mar N° 118 calle central'
           ,'Technoaqu@gmail.com'),
		   ('aqquter'
           ,'9191119023'
           ,'barrio guadalupe N° 117 calle central'
           ,'Aqquter@gmail.com')
GO

SELECT * FROM [Bit_Pur_Provedores]
GO