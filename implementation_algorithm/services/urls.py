from django.urls import path
from . import views

urlpatterns = [
    path('ai-programming-script/', views.ai_programming_script, name='services/ai-programming-script'),
    path('ai-api/', views.ai_api, name='services/ai-api'),
    path('analysis-api/', views.analysis_api, name='services/analysis-api'),
    path('data-repository/', views.data_repository, name='services/data-repository'),
    path('data-virtualization/', views.data_virtualization, name='services/data-virtualization'),
    path('programming-lab/', views.programming_lab, name='services/programming-lab'),
    path('mathematical-lab/', views.mathematical_lab, name='services/mathematical-lab'),
]