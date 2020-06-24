from django.shortcuts import render
from technology import config 
def product_documentation(request):
    return render(request, 'pages/product-documentation.html',{'PHP_HOST': config.PHP_HOST, 'AUTH_LOGIN':config.AUTH_LOGIN,'AUTH_SIGNUP':config.AUTH_SIGNUP})  