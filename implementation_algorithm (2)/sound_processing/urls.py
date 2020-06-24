from django.urls import path
from . import views

urlpatterns = [
   path('sound-analysis', views.sound_analysis, name='sound-analysis')
]