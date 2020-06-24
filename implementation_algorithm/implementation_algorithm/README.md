## Install Mysql 

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
## Install Postgresql

```py
    import psycopg2
    DATABASES = {
        'default': {
            'ENGINE':'django.db.backends.postgresql_psycopg2',
            'NAME': 'db_name',
            'USER': 'postgres',
            'HOST': 'localhost',
            'PASSWORD':'password',
            'PORT': '5432'
        }
    }
```

Cập nhật cấu hình của hệ thống CSDL: `python manage.py migrate`

Lỗi: `Migrations error in django 3; AttributeError: 'str' object has no attribute 'decode'`

Vào folder: `C:\Program Files (x86)\Python37\Lib\site-packages\django\db\backends\mysql` và mở file `operation.py`. Tìm đến dòng `query = query.decode(errors='replace')` và sửa lại thành `query = errors = 'replace'`