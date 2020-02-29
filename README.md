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
+ Social Network 
+ Video Social Network 
+ Image Social Network 
+ Search Engine 
+ Blog Builder
+ Content Management System (CMS)
+ Translate Machine 
+ Digital Map
+ Mediacast
+ App Chat Bot 
+ Office Cloud 
+ TV Channel 
+ Cloud Computing 
+ Computing Interdisciplinary System: Image Processing, video processing, NLP processing, Mathematics, Analytical Chemistry, Archeology, Anthropology,...
+ Project of disaster warning system, project of transportation system
+ ERP, CRM:
  + Phần mềm Kế toán Doanh nghiệp 
  + Phần mềm quản trị doanh nghiệp 
  + Phần mềm quản lý trường học
  + Phần mềm quản lý tài sản
  + Phần mềm quản lý hộ tịch 
  + Phần mềm quản lý nhà hàng
  + Phần mềm quản lý cửa hàng thời trang 
  + Phần mềm tính lương, lập dự toán và cải cách tiền lương 
  + Ứng dụng Blockchain vào quản lý tài chính 
  + Phần mềm quản lý y tế
+ Phần mềm phân tích khoa học:
  + Sentiment Analytics 
  + Image Processing
  + Video Processing
  + Sound Processing
  + Algorithm

