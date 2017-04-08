#!/usr/bin/python

# Import the modules to send commands to the system and access GPIO pins
import RPi.GPIO as gpio
import os
import time
#Libreria para obtener la IP
from subprocess import check_output

#Set pin numbering to board numbering
gpio.setmode(gpio.BOARD)

# Set up pin 38 as output at high state
gpio.setup(38, gpio.OUT, initial=gpio.HIGH)
# Set up pin 7 as an input
gpio.setup(37, gpio.IN) 

# Set up an interrupt to look for pressed button
while True:
	gpio.wait_for_edge(37, gpio.RISING) 
	#Delay de 1 segundo
	time.sleep(1)
	#Reproduce el numero de IP por el parlante
	if gpio.input(37) == True:
		ipAddr = check_output(["hostname","-I"]).split()
		print(ipAddr[0])
		os.system("sudo espeak -ves-la -p 5 -w /var/www/html/ip.wav --punct=\'.\' \'"+ipAddr[0]+"\' 2>/dev/null")
		os.system("sudo aplay -D plughw:1 /var/www/html/ip.wav")
	#Delay de 1 segundo
	time.sleep(1)
	#Antirebote/antiruido
	if gpio.input(37) == True:
		print("Apagando...")
		gpio.output(38, False)
		time.sleep(0.2)
		gpio.output(38, True)
                time.sleep(0.2)
		gpio.output(38, False)
                time.sleep(0.2)
                gpio.output(38, True)
                time.sleep(0.2)
		gpio.output(38, False)
                time.sleep(0.2)
                gpio.output(38, True)
                time.sleep(0.2)
		# Shutdown
		os.system("sudo aplay -D plughw:1 /var/www/html/shutdown.wav")
		time.sleep(0.2)
		os.system('shutdown now -h')
		
