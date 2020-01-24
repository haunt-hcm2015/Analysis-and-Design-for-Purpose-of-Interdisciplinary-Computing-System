from django.shortcuts import render
from technology import config 
def index(request):
    return render(request, 'pages/base.html',{'PHP_HOST': config.PHP_HOST})

