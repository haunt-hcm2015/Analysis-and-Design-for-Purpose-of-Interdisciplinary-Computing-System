from django.urls import path
from . import views

urlpatterns = [
    path('', views.index, name='social-network'),
    path('sign-up/', views.ai_api, name='social-network/sign-up'),
]