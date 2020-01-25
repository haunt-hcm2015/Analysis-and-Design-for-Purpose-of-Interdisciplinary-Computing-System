from django.urls import path
from . import views

urlpatterns = [
    path('computational-interdisciplinary/', views.index, name='computational-interdisciplinary'),
]