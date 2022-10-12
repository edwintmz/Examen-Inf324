import tkinter
from tkinter import*
from tkinter import messagebox
from tkinter import ttk
#import pymysql
import sqlite3

#pantalla principal
def menu_pantalla():
    global pantalla
    pantalla = Tk()
    pantalla.geometry("300x400")
    pantalla.title("Bienvenidos")
    pantalla.iconbitmap("img/goku.ico")

    #para colocar la imagen
    image=PhotoImage(file="img/goku.gif")
    image = image.subsample(5,5)
    label = Label(image=image)
    label.pack()

    #para colocar etiqueta
    Label(text="Bienvenido al sistema", bg="navy", fg="white", width="300", height="3", font=("Calibri",15)).pack()
    Label(text="").pack()

    #para ingresar un boton
    Button(text="Iniciar Sesión", height="3", width="30", command=inicio_sesion).pack()

    pantalla.mainloop()


#pantalla de inicio de sesion
def inicio_sesion():
    global pantalla1
    pantalla1 = Toplevel(pantalla)
    pantalla1.geometry("400x270")
    pantalla1.title("Inicio de sesion")
    pantalla1.iconbitmap("img/goku.ico")

    Label(pantalla1, text="INGRESE SUS USUARIO Y CONTRASEÑA\nPARA INICIAR SESION", bg="navy", fg="white", width="300", height="3", font=("Calibri",15)).pack()
    Label(pantalla1, text="").pack()

    global usuario
    global pasword

    usuario = StringVar()
    pasword = StringVar()

    global usuario_entry
    global pasword_entry

    Label(pantalla1, text="Usuario").pack()
    usuario_entry = Entry(pantalla1, textvariable=usuario)
    usuario_entry.pack()
    Label(pantalla1).pack()

    Label(pantalla1, text="Password").pack()
    pasword_entry = Entry(pantalla1, show="*", textvariable=pasword)
    pasword_entry.pack()
    Label(pantalla1).pack()

    Button(pantalla1, text="Iniciar sesion", width="20", height="2", command=inicio).pack() #cambiar inicio por validacion_daos



#prueba para inicio de seseion
def inicio():
    miConexion = sqlite3.connect("academico_edwintmz")
    #miConexion = pymysql.connect(host="localhost", user="root", passwd="", db="academico_edwintmz")
    miCursor = miConexion.cursor()
   
    usu = usuario.get()
    psw = pasword.get()

    miCursor.execute("SELECT count(ci), rol FROM acceso WHERE usuario = '"+usu+"' and password='"+psw+"'")

    vp=miCursor.fetchall()

    dt = [(1,'director')]
    dc = [(1,'docente')]
    es = [(1,'estudiante')]
    
    #aqui va conexion a la base de datos
    if dt == vp:
        director()
    elif dc == vp:
        docente()
    elif es == vp:
        estudiante()
    else:
        messagebox.showinfo(title="Inicio de sesion incorrecta", message="Usuario y contraseña INCORRECTO")

    miConexion.commit()
    miConexion.close()


#para ver pantalla director
def director():
    #aqui la conexion a la base de datos
    miConexion = sqlite3.connect("academico_edwintmz")
    #miConexion = pymysql.connect(host="localhost", user="root", passwd="", db="academico_edwintmz")
    miCursor = miConexion.cursor()

    global pantalla2
    pantalla2 = Toplevel(pantalla)
    pantalla2.geometry("400x2570")
    pantalla2.title("Director")
    pantalla2.iconbitmap("img/goku.ico")

    Label(pantalla2, text="BIENVENIDO DIRECTOR", bg="navy", fg="white", width="300", height="3", font=("Calibri",15)).pack()
    Label(pantalla2, text="").pack()

    Label(pantalla2, text="Promedio de notas", font=("Calibri",15)).pack()
    Label(pantalla2, text="").pack()
    
    #para las tablas
    Label(pantalla2, text="Departamento  | Cant. Notas  | Promedio", font=("Calibri",13)).pack()
    
    miCursor.execute('''SELECT departamento, COUNT(notaf) as can, 
                (CASE
                    WHEN departamento = 01 THEN AVG(notaf)
                    WHEN departamento = 02 THEN AVG(notaf)
                    WHEN departamento = 03 THEN AVG(notaf)
                    WHEN departamento = 04 THEN AVG(notaf)
                    WHEN departamento = 05 THEN AVG(notaf)
                    WHEN departamento = 06 THEN AVG(notaf)
                    ELSE 'No Hay Dato'
                    END
                ) as nota
            FROM persona
            JOIN inscripcion ON persona.ci = inscripcion.ci
            GROUP BY departamento''')

    miCursor.execute("SELECT departamento, COUNT(notaf), AVG(notaf) FROM persona JOIN inscripcion ON persona.ci = inscripcion.ci GROUP BY departamento")

    vp = miCursor.fetchall()

    for noto in vp:
        Label(pantalla2, text=" " + noto[0] + "         |        " + str(noto[1]) + "          |     " + str(noto[2]), font=("Calibri",13)).pack()
        
    Label(pantalla2, text="").pack()

    miConexion.commit()
    miConexion.close()


#para ver pantalla docente
def docente():
    global pantalla3
    pantalla3 = Toplevel(pantalla)
    pantalla3.geometry("400x270")
    pantalla3.title("Docente")
    pantalla3.iconbitmap("img/goku.ico")

    Label(pantalla3, text="BIENVENIDO DOCENTE", bg="navy", fg="white", width="300", height="3", font=("Calibri",15)).pack()
    Label(pantalla3, text="").pack()

    Label(pantalla3, text="vista para el docente", font=("Calibri",15)).pack()
    Label(pantalla3, text="").pack()


#para ver pantalla estudiante
def estudiante():
    global pantalla4
    pantalla4 = Toplevel(pantalla)
    pantalla4.geometry("400x270")
    pantalla4.title("estudiante")
    pantalla4.iconbitmap("img/goku.ico")

    Label(pantalla4, text="BIENVENIDO ESTUDIANTE", bg="navy", fg="white", width="300", height="3", font=("Calibri",15)).pack()
    Label(pantalla4, text="").pack()

    Label(pantalla4, text="vista para el estudiante", font=("Calibri",15)).pack()
    Label(pantalla4, text="").pack()
    
menu_pantalla()



