USE [Bit_Pur_DB]
GO

INSERT INTO [dbo].[Bit_Pur_Clientes]
           ([giro]
		   ,[nombre_cli]
           ,[frecuencia]
           ,[dispensadores]
           ,[garafones]
           ,[exhibidores]
           ,[portagarafones]
           ,[costo_por_destruccion])
     VALUES
           ('restaurant',
			'palomas',
			'diario',
			'2',
			'2',
			'2',
			'2',
			'60.50'),
			('tienda',
			'barotes la esquina',
			'semanal',
			'1',
			'10',
			'1',
			'1',
			'50.50')
GO

SELECT * FROM [Bit_Pur_Clientes]
GO