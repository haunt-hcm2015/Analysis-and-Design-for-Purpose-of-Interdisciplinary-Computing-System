from django.urls import path
from . import views

urlpatterns = [
    path('', views.index),
    path('product-documentation/', views.product_documentation, name='technology/product-documentation'),
    path('ai-language/', views.ai_language, name='technology/ai-language'),
    path('ai-cloud/', views.ai_cloud, name='technology/ai-cloud'),
    path('ai-natural-language-understanding/', views.ai_natural_language_understanding, name='technology/ai-natural-language-understanding'),
    path('ai-digital-map/', views.ai_digital_map, name='technology/ai-digital-map'),
    
]