from time import sleep
import requests
import serial
ser = serial.Serial("COM3",9600)
# count = 1;
while True:
	# sleep(1)
	getVal = ser.readline()
	val = str(getVal).replace("b'","").replace("\\r\\n'","")
	arr = val.split(",")
	print(arr)

	# send to web server (php)
	userdata = {"temperature": arr[0], "turbidity": arr[1], "ph": arr[2]}
	# resp = requests.post('http://localhost:8080/waterqualitysystem/insert_data.php', params=userdata)
	resp = requests.post('http://waterqualitysystem2.000webhostapp.com/insert_data.php', params=userdata)
	# count += 1

# b'Temperature:-   28.69\r\n'
# b'Turbidity:-  35.94\r\n'
# b'pH:-   7.6\r\n'
# b'Temperature:-   28.69\r\n'
# b'Turbidity:-  35.84\r\n'
# b'pH:-   7.5\r\n'