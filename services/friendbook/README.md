# Social Network Analysis
## Install Python Library
+ Cài Python 2.7 và thiết lập biến môi trường
+ Cài tất cả thư viện chung cho project: pip install -r requirements.txt
+ Cài OpenCV:
	+ Cài đặt các gói thư viện của OpenCV: pip install numpy matplotlib
	+ Tải OpenCV về máy mình và giải nén data: http://sourceforge.net/projects/opencvlibrary/files/opencv-win/2.4.6/OpenCV-2.4.6.0.exe/download
	+ Vào thư mục vừa giải nén "opencv/build/python/cv2/python-2.7"
	+ Sao chép file "cv2.pyd" sang thư mục C:/Python27/lib/site-packeges
	+ Test: Mở cmd -> gõ python -> nhập 
		
		```>>> import cv2
		   >>> print cv2.__version__
		```
	+ Nếu không báo lỗi thì coi như là cài xong OpenCV
+ Cài Tensorflow bằng Ananconda trên Windows:
  + Tải Anaconda theo phiên bản phù hợp đang làm việc và cài đặt
  + Thiết lập biến môi trường: `C:\Users\NTH\Anaconda2\Scripts`
  + `conda activate`
  + `conda create --name tensorflow pip python=3.7`
  + `activate tensorflow` (command prompt administrator)
  + `conda install -c conda-forge tensorflow`
	  
	  ```
	  python
	  >>> import tensorflow as tf
	  >>> print(tf.__version__)
	  ```
  + `conda install tensorflow-gpu`
+ Cài Tesseract-OCR:
	+ Tạo thư mục C:\Program Files (x86)\Tesseract-OCR
	+ Mở file cài đặt .exe và cài đặt vào thư mục Tesseract-OCR
	+ Sau khi cài xong thì thiết lập biến môi trường trong đường dẫn "C:\Program Files (x86)\Tesseract-OCR\tesseract.exe"

+ 

```
	select `status`, `postID`, `postBy`, `postImage` from `post` 
	INTO OUTFILE '/status.csv' 
	FIELDS TERMINATED BY ',' 
	LINES TERMINATED BY '\n'
```
