import sqlite3

miConexion = sqlite3.connect("academico_edwintmz")

miCursor = miConexion.cursor()

miCursor.execute('''
    CREATE TABLE acceso (
        id integer primary key autoincrement,
        nombre varchar(50),
        ci varchar(50),
        rol varchar(50),
        usuario varchar(50),
        password varchar(50))
    ''')

axes = [
    ('Edwin', '101010', 'estudiante', 'edwintmz', '123456'),
    ('Veronica', '101024', 'docente', 'veronicasc', '12345'),
    ('Selena', '102025', 'director', 'selenagc', '123456'),
    ('Roberto', '124578', 'estudiante', 'robertord', '12345'),
    ('Miriam', '235689', 'estudiante', 'miriamla', '123456'),
    ('Pedro', '142536', 'estudiante', 'pedro10', '123456')
]

miCursor.executemany("INSERT INTO acceso VALUES (NULL,?,?,?,?,?)",axes)

miCursor.execute('''
    CREATE TABLE persona (
        ci varchar(50) primary key,
        nom_com varchar(50),
        fec_nac date,
        departamento varchar(50))
    ''')

per = [
    ('101010', 'Edwin Tito Mz', '2003-04-13', '01'),
    ('124578', 'Roberto Rosas Dias', '2002-02-25', '03'),
    ('235689', 'Miriam Lopez Alcon', '1999-10-25', '02'),
    ('142536', 'Pedro Calle Ortiz', '2002-02-25', '02'),
    ('142530', 'Ruben Peres Lopez', '2006-10-15', '04'),
    ('142531', 'Roberto Dias Calle', '2009-10-05', '01'),
    ('101024', 'Veronica Suxo Calle', '1991-05-13', '01'),
    ('102025', 'Selena Gomez Condori', '1995-04-04', '01'),
    ('202020', 'Pedro Calle Perez', '1985-08-20', '02')
]

miCursor.executemany("INSERT INTO persona VALUES (?,?,?,?)",per)

miCursor.execute('''
    CREATE TABLE inscripcion (
        id integer primary key autoincrement,
        sigla varchar(50),
        ci varchar(50),
        nota1 integer,
        nota2 integer,
        nota3 integer,
        notaf integer)
    ''')

nota = [
    ('mat-100', '101010', 30, 25, 20, 75),
    ('mat-101', '101010', 25, 26, 18, 69),
    ('mat-100', '142531', 16, 16, 20, 52),
    ('fis-200', '124578', 20, 20, 20, 60),
    ('fis-300', '124578', 30, 30, 10, 70),
    ('inf-111', '235689', 30, 30, 30, 90),
    ('inf-121', '142536', 15, 20, 25, 60),
    ('qmc-100', '142530', 26, 25, 30, 81),
    ('qmc-103', '142530', 19, 18, 17, 52),
    ('qmc-200', '142530', 10, 20, 25, 55),
    ('qmc-102', '142530', 30, 15, 25, 70)
]

miCursor.executemany("INSERT INTO inscripcion VALUES (NULL,?,?,?,?,?,?)",nota)
                
miConexion.commit()
miConexion.close()
