#!/usr/bin/python

# Para ejecutar este script usar <decir "texto">

# Importa funciones del sistema
import sys
import os
# Importa funciones de tiempo
import time
# Importa funciones de usuario
import pwd

pitch = "-p 5"
export = "-w /var/www/html/out.wav"
mensaje = sys.argv[1]
user = pwd.getpwuid(os.getuid())[0]

file = open("/var/www/html/speaklog.html","a")
file.write("<div style=\"color: #FFF; background: #111\">[" + time.strftime("%d/%m/%y %H:%M:%S") + "]>>>" + user + ": " + mensaje + "<br></div>")
file.close()
 
os.system("sudo espeak -ves-la "+pitch+" "+export+" \'"+mensaje+"\' 2>/dev/null")
os.system("sudo aplay -D plughw:1 /var/www/html/out.wav")
os.system("sudo lame /var/www/html/out.wav /var/www/html/out.mp3")
