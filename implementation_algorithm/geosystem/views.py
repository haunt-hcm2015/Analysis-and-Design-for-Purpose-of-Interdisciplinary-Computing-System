from django.shortcuts import render
from technology import config
def gis(request):
    return render(request, 'pages/geographics-information-system.html',{'PHP_HOST': config.PHP_HOST})  
