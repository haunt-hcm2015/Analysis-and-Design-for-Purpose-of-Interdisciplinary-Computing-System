# Analysis and Design for purpose of Interdisciplinary Computing System
Lưu trữ mã nguồn của đồ án chuyên ngành: Ứng dụng các thuật toán khoa học tự nhiên và khoa học xã hội vào phân tích và thiết kế hệ thống tính toán liên ngành
### Subject of the study
Applied Algorithms
### System Configuration 
- AI: Django 3, Flask, Python 3.7, R
- Backend: Python 3.7, PHP 7, Javascript
- Server: Xampp
- DB: Mysql
  + Cấu hình Mysql trong Django tại file settings.py của project: `pip install wheel` và `pip install pymysql`
  
	```py
		import pymysql
		pymysql.version_info = (1, 3, 13, "final", 0)
		pymysql.install_as_MySQLdb()
		DATABASES = {
			'default': {
				'ENGINE': 'django.db.backends.mysql',
				'NAME': 'ai-solution',
				'USER': 'root',
				'PASSWORD': '',
				'HOST': '127.0.0.1',
				'PORT': '3306',
				'OPTIONS': {
					'init_command': "SET sql_mode='STRICT_TRANS_TABLES'",
				}
			},
		}
	```
   + Cập nhật cấu hình của hệ thống CSDL: `python manage.py migrate`

### AI Solution Products:
+ Social Network as Open Source
+ Video Social Network as Open Source
+ Image Social Network as Open Source
+ Search Engine as Open Source
+ Blog Builder
+ Computing Interdisciplinary System: Image Processing, video processing, NLP processing, Mathematics, Analytical Chemistry, Archeology, Anthropology,... 