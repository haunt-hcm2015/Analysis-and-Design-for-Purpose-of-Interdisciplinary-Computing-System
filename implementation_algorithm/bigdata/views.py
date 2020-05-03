from django.shortcuts import render
from technology import config 
def index(request):
    return render(request, 'pages/base.html',{'PHP_HOST': config.PHP_HOST, 'AUTH_LOGIN':config.AUTH_LOGIN,'AUTH_SIGNUP':config.AUTH_SIGNUP})

