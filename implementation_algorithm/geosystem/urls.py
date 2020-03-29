from django.urls import path
from . import views 

urlpatterns = [
    path('geographics-information-system/', views.gis, name='geosystem/geographics-information-system')
]