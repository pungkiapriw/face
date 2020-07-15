import face_recognition
import cv2
import numpy as np
import random
import mysql.connector
import smtplib
from datetime import datetime
import time
mydb = mysql.connector.connect(
  host="localhost",
  user="root",
  password="",
  database="face"
)
currenttime = time.time()
mycursor = mydb.cursor()
# query="insert into mahasiswa (nim,nama,email,foto) values (%s,%s,%s,%s)"
# val = ("16090069","ilyas abdurahman yusuf","andrenuryana@gmail.com","ucup.png")
# mycursor.execute(query,val)
# mydb.commit()
video_capture = cv2.VideoCapture(0)

	# Load a sample picture and learn how to recognize it.
known_face_encodings = [

]
known_face_names = [

]
emails = []

def update():
	global known_face_encodings, known_face_names, video_capture, emails
	mycursor.execute("SELECT * FROM mahasiswa")
	myresult = mycursor.fetchall()
	# This is a demo of running face recognition on live video from your webcam. It's a little more complicated than the
	# other example, but it includes some basic performance tweaks to make things run a lot faster:
	#   1. Process each video frame at 1/4 resolution (though still display it at full resolution)
	#   2. Only detect faces in every other frame of video.

	# PLEASE NOTE: This example requires OpenCV (the `cv2` library) to be installed only to read from your webcam.
	# OpenCV is *not* required to use the face_recognition library. It's only required if you want to run this
	# specific demo. If you have trouble installing it, try any of the other demos that don't require it instead.
	video_capture = cv2.VideoCapture(0)

	# Load a sample picture and learn how to recognize it.
	known_face_encodings = [

	]
	known_face_names = [

	]
	emails = []
	
	for x in myresult:
		images = face_recognition.load_image_file("images/{}".format(x[4]))
		encoding = face_recognition.face_encodings(images)[0]
		known_face_encodings.append(encoding)
		known_face_names.append(str(x[1]))
		emails.append(x[3])

	# Create arrays of known face encodings and their names



def main():
	global known_face_encodings, known_face_names, video_capture, emails, currenttime
	update()
	# Initialize some variables
	face_locations = []
	face_encodings = []
	face_names = []
	process_this_frame = True
	i=0
	unknown_face = []

	print('1. untuk membuka camera')
	print('2. untuk training')
	foto = int(input('masukan perintah : '))
	print(foto)
	if(foto==2):
		print('training data...\n')
		nim = input("Masukan nim kamu : ")
		QueryCek = "select * from mahasiswa where nim = {}".format(nim)
		mycursor.execute(QueryCek)
		result=mycursor.fetchall()
		if(len(result)>0):
			print("maaf nim tersebut sudah digunakan\n")
			main()
		nama = input("Masukan nama kamu : ")
		email = input("Masukan email kamu : ")
		print("\nUntuk ambil foto tekan Y  di keyboard satu kali ketika kamera muncul")
		 # video capture source camera (Here webcam of laptop) 
		ret, frame = video_capture.read() # return a single frame in variable `frame`
		while True:
			# Grab a single frame of video
			ret, frame = video_capture.read()
		
			cv2.imshow('Video', frame)
			if cv2.waitKey(1) & 0xFF == ord('y'):
				cv2.imwrite("images/{}.png".format(nim),frame)
				break
			
		# Release handle to the webcam
		video_capture.release()
		cv2.destroyAllWindows()
		queryInsert = "insert into mahasiswa (nim,nama,email,foto) values (%s,%s,%s,%s)"
		values = (nim,nama,email,"{}.png".format(nim))
		mycursor.execute(queryInsert,values)
		mydb.commit()

		print("data berhasil ditraining.")

		main()
	elif(foto==1):
		print('membuka kamera')
		while True:
			# Grab a single frame of video
			ret, frame = video_capture.read()
			# frame = cv2.cvtColor(frame,cv2.COLOR_BGR2GRAY)

			# Resize frame of video to 1/4 size for faster face recognition processing
			small_frame = cv2.resize(frame, (0, 0), fx=0.25, fy=0.25)

			# Convert the image from BGR color (which OpenCV uses) to RGB color (which face_recognition uses)
			rgb_small_frame = small_frame[:, :, ::-1]

			# Only process every other frame of video to save time
			if process_this_frame:
				# Find all the faces and face encodings in the current frame of video
				face_locations = face_recognition.face_locations(rgb_small_frame)
				face_encodings = face_recognition.face_encodings(rgb_small_frame, face_locations)

				face_names = []
				for face_encoding in face_encodings:
					# See if the face is a match for the known face(s)
					matches = face_recognition.compare_faces(known_face_encodings, face_encoding)
					name = "unknown"

					# # If a match was found in known_face_encodings, just use the first one.
					# if True in matches:
					#     first_match_index = matches.index(True)
					#     name = known_face_names[first_match_index]

					# Or instead, use the known face with the smallest distance to the new face
					face_distances = face_recognition.face_distance(known_face_encodings, face_encoding)
					best_match_index = np.argmin(face_distances)
					if matches[best_match_index]:
						name = known_face_names[best_match_index]
						email = emails[best_match_index]
					# else:
					# 	print(i)

					face_names.append(name)

			process_this_frame = not process_this_frame


			# Display the results
			for (top, right, bottom, left), name in zip(face_locations, face_names):
				# Scale back up face locations since the frame we detected in was scaled to 1/4 size
				top *= 4
				right *= 4
				bottom *=4 
				left *= 4

				# Draw a box around the face
				cv2.rectangle(frame, (left, top), (right, bottom), (0, 255, 0), 1)
				if(time.time() - currenttime > 59):
					update()
					print('data updated')
					currenttime = time.time()
				# Draw a label with a name below the face
				cv2.rectangle(frame, (left, bottom - 20), (right, bottom), (0, 255, 0), cv2.FILLED)
				font = cv2.FONT_HERSHEY_DUPLEX
				cv2.putText(frame, name, (left + 6, bottom - 6), font, 0.5 , (255, 255, 255), 1)
				if(name != 'unknown'):
					mydb.commit()
					query = "SELECT nim FROM absensi where nim = '{}' and created_at >= CURDATE()".format(name)
					mycursor.execute(query)
					hasil = mycursor.fetchall()
					print(len(hasil))
					if(len(hasil)<1):
						newQuery = "insert into absensi (nim,status) values(%s,%s)"
						values = (name,"hadir")
						mycursor.execute(newQuery,values)
						mydb.commit()
						fromaddr = 'hidroponikapps@gmail.com'
						toaddrs  = email
						hari = datetime.today().strftime('%Y-%m-%D')
						msg = 'Hi, {} Anda sudah absen pada tanggal {}'.format(name,hari)
						username = 'pungkiapriw@gmail.com'
						password = 'iywgzzoovvpcwodt'
						server = smtplib.SMTP('smtp.gmail.com:587')
						server.starttls()
						server.login(username,password)
						server.sendmail(fromaddr, toaddrs, msg)
						server.quit()
				else:
					print(name)
					

			# Display the resulting image
			cv2.imshow('Video', frame)

			# Hit 'q' on the keyboard to quit!
			if cv2.waitKey(1) & 0xFF == ord('q'):
				break

		# Release handle to the webcam
		video_capture.release()
		cv2.destroyAllWindows()
		main()
	elif(foto==3):
		print("exit")
	else:
		print('maaf perintah tidak di kenali')
def refresh(var):
	print(var)
	
main()