from django.shortcuts import render
from django.core.files.storage import FileSystemStorage
import numpy as np
import argparse
import imutils
from imutils.video import VideoStream
import time
import cv2
import os
import sys
import face_recognition
import pickle


def objectDetection(url, videoName):
	videoNameOutput = videoName + '.avi'
	dir_path = os.path.dirname(os.path.realpath(__file__))
	labelsPath = os.path.sep.join([dir_path + '\\yolo-coco', "coco.names"])
	LABELS = open(labelsPath).read().strip().split("\n")
	np.random.seed(42)
	COLORS = np.random.randint(0, 255, size=(len(LABELS), 3), dtype="uint8")
	weightsPath = os.path.sep.join([dir_path + '\\yolo-coco', "yolov3.weights"])
	configPath = os.path.sep.join([dir_path + '\\yolo-coco', "yolov3.cfg"])
	print("[INFO] loading YOLO from disk...")
	net = cv2.dnn.readNetFromDarknet(configPath, weightsPath)
	ln = net.getLayerNames()
	ln = [ln[i[0] - 1] for i in net.getUnconnectedOutLayers()]
	vs = cv2.VideoCapture(url)
	writer = None
	(W, H) = (None, None)
	try:
		prop = cv2.cv.CV_CAP_PROP_FRAME_COUNT if imutils.is_cv2() \
			else cv2.CAP_PROP_FRAME_COUNT
		total = int(vs.get(prop))
		print("[INFO] {} total frames in video".format(total))
	except:
		print("[INFO] could not determine # of frames in video")
		print("[INFO] no approx. completion time can be provided")
		total = -1
	while True:
		(grabbed, frame) = vs.read()
		if not grabbed:
			break
		if W is None or H is None:
			(H, W) = frame.shape[:2]
		blob = cv2.dnn.blobFromImage(frame, 1 / 255.0, (416, 416), swapRB=True, crop=False)
		net.setInput(blob)
		start = time.time()
		layerOutputs = net.forward(ln)
		end = time.time()
		boxes = []
		confidences = []
		classIDs = []
		for output in layerOutputs:
			for detection in output:
				scores = detection[5:]
				classID = np.argmax(scores)
				confidence = scores[classID]
				if confidence > 0.5:
					box = detection[0:4] * np.array([W, H, W, H])
					(centerX, centerY, width, height) = box.astype("int")
					x = int(centerX - (width / 2))
					y = int(centerY - (height / 2))
					boxes.append([x, y, int(width), int(height)])
					confidences.append(float(confidence))
					classIDs.append(classID)
		idxs = cv2.dnn.NMSBoxes(boxes, confidences, 0.5, 0.3)
		if len(idxs) > 0:
			for i in idxs.flatten():
				(x, y) = (boxes[i][0], boxes[i][1])
				(w, h) = (boxes[i][2], boxes[i][3])
				color = [int(c) for c in COLORS[classIDs[i]]]
				cv2.rectangle(frame, (x, y), (x + w, y + h), color, 2)
				text = "{}: {:.4f}".format(LABELS[classIDs[i]], confidences[i])
				cv2.putText(frame, text, (x, y - 5), cv2.FONT_HERSHEY_SIMPLEX, 0.5, color, 2)
		if writer is None:
			fourcc = cv2.VideoWriter_fourcc(*"MJPG")
			writer = cv2.VideoWriter('media/' + videoNameOutput, fourcc, 30, (frame.shape[1], frame.shape[0]), True)
			if total > 0:
				elap = (end - start)
				print("[INFO] single frame took {:.4f} seconds".format(elap))
				print("[INFO] estimated total time to finish: {:.4f}".format(elap * total))
		writer.write(frame)
	print("[INFO] cleaning up...")
	if writer is not None:
		writer.release()
	vs.release()

def faceDetection(url, videoName):
    pass
def video_analysis(request):
	context = {}
	videoUrl = ''
	DJANGO_URL = 'http://localhost:8000'
	if request.method == 'POST':
		upload_video = request.FILES['video_files']
		fs = FileSystemStorage()
		name = fs.save(upload_video.name, upload_video)
		context['url'] = fs.url(name)
		videoUrl = DJANGO_URL + fs.url(name)
		videoName = os.path.splitext(upload_video.name)[0]
		objectDetection(videoUrl, videoName)
	return render(request, 'video-analysis.html', context)
