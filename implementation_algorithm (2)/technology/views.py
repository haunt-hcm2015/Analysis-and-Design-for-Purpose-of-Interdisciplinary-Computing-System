from django.shortcuts import render
from . import config


def ai_language(request):
    return render(request, 'pages/ai-language.html',{'PHP_HOST': config.PHP_HOST, 'AUTH_LOGIN':config.AUTH_LOGIN,'AUTH_SIGNUP':config.AUTH_SIGNUP})
def ai_cloud(request):
    return render(request, 'pages/ai-cloud.html',{'PHP_HOST': config.PHP_HOST, 'AUTH_LOGIN':config.AUTH_LOGIN,'AUTH_SIGNUP':config.AUTH_SIGNUP})
def ai_natural_language_understanding(request):
    return render(request, 'pages/ai-natural-language-understanding.html',{'PHP_HOST': config.PHP_HOST, 'AUTH_LOGIN':config.AUTH_LOGIN,'AUTH_SIGNUP':config.AUTH_SIGNUP})
def ai_digital_map(request):
    return render(request, 'pages/ai-digital-map.html',{'PHP_HOST': config.PHP_HOST, 'AUTH_LOGIN':config.AUTH_LOGIN,'AUTH_SIGNUP':config.AUTH_SIGNUP})
def product_documentation(request):
    return render(request, 'pages/product-documentation.html',{'PHP_HOST': config.PHP_HOST, 'AUTH_LOGIN':config.AUTH_LOGIN,'AUTH_SIGNUP':config.AUTH_SIGNUP})  

