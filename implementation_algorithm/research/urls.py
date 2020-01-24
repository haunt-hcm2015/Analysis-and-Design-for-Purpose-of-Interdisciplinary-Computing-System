from django.urls import path
from . import views

urlpatterns = [
    path('algorithm/', views.algorithm, name='research/algorithm'),
    path('artificial-intelligence/', views.artificial_intelligence, name='research/artificial-intelligence'),
    path('vr-ar/', views.vr_ar, name='research/vr-ar'),
    path('computer-science/', views.computer_science, name='research/computer-science'),
    path('software-engineering/', views.software_engineering, name='research/software-engineering'),
    path('system-information/', views.system_information, name='research/system-information'),
]