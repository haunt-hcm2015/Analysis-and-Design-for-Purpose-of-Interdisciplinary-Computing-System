# Geographic Information System 
+ Kích hoạt phần mở rộng Postgis
    + Khởi động Stackbuilder của Postgis và cài Postgis nếu chưa kích hoạt sẵn
    + Kích hoạt kiểu dữ liệu hệ thống GIS trong Postgis: 

        ```py
        CREATE EXTENSION Postgis;
        CREATE EXTENSION Postgis_topology;
        CREATE EXTENSION Postgis_sfcgal;
        CREATE EXTENSION Postgis_tiger_geocoder;
        CREATE EXTENSION fuzzystrmatch;
        CREATE EXTENSION address_standardizer;
        CREATE EXTENSION address_standardizer_data_us;
        CREATE EXTENSION pgrouting;
        CREATE EXTENSION ogr_fdw;
        CREATE EXTENSION pointcloud;
        CREATE EXTENSION pointcloud_postgis;
        ```
+ Thêm template `django.contrib.gis` vào `INSTALLED_APP` để xử lý giao diện hiển thị bản đồ
+ Ứng dụng GIS dùng Postgresql được cấu hình CSDL:

    ```py
    DATABASES = {
        'default': {
            'ENGINE':'django.contrib.gis.db.backends.postgis',
            'NAME': 'ai_solution',
            'USER': 'postgres',
            'HOST': 'localhost',
            'PASSWORD':'pass',
            'PORT': '5432'
        }
    }
    ```
+ Cài thư viện GDAL xử lý vector và tọa độ không gian GIS: 
  + Tải thư viện [GADL](https://www.lfd.uci.edu/~gohlke/pythonlibs/#gdal)
  + Cài đặt thư viện: `pip install GDAL-2.4.1-cp37-cp37m-win32.whl`
+ khai báo thư viện xử lý trong tập tin settings.py: `GDAL_LIBRARY_PATH = r"C:/Program Files (x86)/Python37/Lib/site-packages/osgeo/gdal204"`
+ Restart windows và server Django 

+ Cấu hình app GIS trong admin
    + Cấu hình template admin cho app geo system: `pip install django-leaflet`
    + Thêm app vào trang quản trị:
    ```py
        from django.contrib import admin
        from .models import Incidence
        from leaflet.admin import LeafletGeoAdmin
        class IncidencesAdmin(LeafletGeoAdmin):
            list_display  = ['name', 'location', 'description', 'created', 'updated']
            list_filter   = ['name']
        admin.site.register(Incidence, IncidencesAdmin)
    ```
    
![](https://lh3.googleusercontent.com/THG_NJSitHZXxaWNxM_X3z-Mo4OYLG-BlBAzo_wE6qEJhJGrHBmFgsJCz9HI3a-zw-sVmZZZ1K-cTDvxQftJuMFjACp3RckAmQOvmN5fNAiyD1EnWszP4QK5sWo9gXpvuubOuUQor30O0kBowFYfZ-T2IAIk6ve9aJmQhC2QUh9FoNfSjcjRgOhucecDqwi-vGqF8XCct4LMWDJGk5m4Sd9BmR6CmS39mxaAOusMZsyzFu17Jpv_PqxoHGvGB7If4LUJjTBqoaa-aLvq9zYuuXi6CsyYbLio4Plu9wkuF2X2YUdgjcVrJBkkWQfRx_qVqs-KYqk1uML6BWzgqTJhaezCimeAAdbRiWZQLsGQt0KUAryMcyZNxlYGUntE-KSht2foPXaLZ4KrS0Nu-EFz7GYRZT_a7-L8a3xL6iCekDHxxbtrMul1P0sTi3wTKx9nBK6i2ZYvglX-HTuBnwmwMQDCatHc7um8sa0g-fRIGEkaxT8rB7LqCUe0--eX8sVbhyZ0OdcXJmSEonQfdmqpCIOprowl2Vc5_fpHVRH0VPJnrP9wb7BZLpvC-XcZs4gP7fGOgf6eB5jir6sU6xeoZk4j5l-yK8VBYw1jgm-W1qjYpUxuzzDp0qaClvksJOapg3ZrfOembmBu-CQCJMw6__6N0EgNrJAqBSp0-iw2hLPVo1Ba4Q93aazl2dW5EgaFcJ9kiHvrSY2BRw71QV3ZyvPJvEuxSIZa8M_A2AcHROB0pW6oRJXyX_I=w1272-h576-no)

+ Tạo GIS Model từ tập dữ liệu dữ liệu không gian:
    `python manage.py ogrinspect geosystem/covid-19-global-live-data global_covid19_live_update.shp --srid=4326 --mapping --multi`
    