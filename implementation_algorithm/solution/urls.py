from django.urls import path
from . import views

urlpatterns = [
    path('computational-interdisciplinary/', views.computational_interdisciplinary, name='solution/computational-interdisciplinary'),
    path('aerospace-engineering-and-defense/', views.aerospace_engineering_and_defense, name='solution/aerospace-engineering-and-defense'),
    path('automotive-engineering/', views.automotive_engineering, name='solution/automotive-engineering'),
    path('chemical-engineering/', views.chemical_engineering, name='solution/chemical-engineering'),
    path('control-systems/', views.control_systems, name='solution/control-systems'),
    path('data-science/', views.data_science, name='solution/data-science'),
    path('electrical-engineering/', views.electrical_engineering, name='solution/electrical-engineering'),
    path('image-processing/', views.image_processing, name='solution/image-processing'),
    path('video-processing/', views.video_processing, name='solution/video-processing'),
    path('industrial-engineering/', views.industrial_engineering, name='solution/industrial-engineering'),
    path('signal-processing/', views.signal_processing, name='solution/signal-processing'),
    path('statistics/', views.statistics, name='solution/statistics'),
    path('software-engineering/', views.software_engineering, name='solution/software-engineering'),
    path('nlp-processing/', views.nlp_processing, name='solution/nlp-processing'),
    path('web-development/', views.web_development, name='solution/web-development'),
]