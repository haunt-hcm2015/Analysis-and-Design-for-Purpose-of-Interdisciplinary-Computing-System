from django.shortcuts import render, get_object_or_404
from .models import Field
from technology import config


def computational_interdisciplinary(request):
    data = {'areaOfApplication' : Field.objects.all(), 'PHP_HOST': config.PHP_HOST, 'AUTH_LOGIN':config.AUTH_LOGIN,'AUTH_SIGNUP':config.AUTH_SIGNUP}
    return render(request, 'pages/computational-interdisciplinary.html',data)
def computing_image_processing(request):
    data = {'PHP_HOST': config.PHP_HOST, 'AUTH_LOGIN':config.AUTH_LOGIN,'AUTH_SIGNUP':config.AUTH_SIGNUP}
    return render(request, 'pages/computational-interdisciplinary/image-processing.html', data)
def computing_video_processing(request):
    data = {'PHP_HOST': config.PHP_HOST,'AUTH_LOGIN':config.AUTH_LOGIN,'AUTH_SIGNUP':config.AUTH_SIGNUP}
    return render(request, 'pages/computational-interdisciplinary/video-processing.html', data)
def aerospace_engineering_and_defense(request):
    return render(request, 'pages/aerospace-engineering-and-defense.html',{'PHP_HOST': config.PHP_HOST, 'AUTH_LOGIN':config.AUTH_LOGIN,'AUTH_SIGNUP':config.AUTH_SIGNUP})
def automotive_engineering(request):
    return render(request, 'pages/automotive-engineering.html',{'PHP_HOST': config.PHP_HOST, 'AUTH_LOGIN':config.AUTH_LOGIN,'AUTH_SIGNUP':config.AUTH_SIGNUP})
def chemical_engineering(request):
    return render(request, 'pages/chemical-engineering.html',{'PHP_HOST': config.PHP_HOST, 'AUTH_LOGIN':config.AUTH_LOGIN,'AUTH_SIGNUP':config.AUTH_SIGNUP})
def control_systems(request):
    return render(request, 'pages/control-systems.html',{'PHP_HOST': config.PHP_HOST, 'AUTH_LOGIN':config.AUTH_LOGIN,'AUTH_SIGNUP':config.AUTH_SIGNUP})
def data_science(request):
    return render(request, 'pages/data-science.html',{'PHP_HOST': config.PHP_HOST, 'AUTH_LOGIN':config.AUTH_LOGIN,'AUTH_SIGNUP':config.AUTH_SIGNUP})
def electrical_engineering(request):
    return render(request, 'pages/electrical-engineering.html',{'PHP_HOST': config.PHP_HOST, 'AUTH_LOGIN':config.AUTH_LOGIN,'AUTH_SIGNUP':config.AUTH_SIGNUP})   
def image_processing(request):
    return render(request, 'pages/image-processing.html',{'PHP_HOST': config.PHP_HOST, 'AUTH_LOGIN':config.AUTH_LOGIN,'AUTH_SIGNUP':config.AUTH_SIGNUP})  
def video_processing(request):
    return render(request, 'pages/video-processing.html',{'PHP_HOST': config.PHP_HOST, 'AUTH_LOGIN':config.AUTH_LOGIN,'AUTH_SIGNUP':config.AUTH_SIGNUP})  
def industrial_engineering(request):
    return render(request, 'pages/industrial-engineering.html',{'PHP_HOST': config.PHP_HOST, 'AUTH_LOGIN':config.AUTH_LOGIN,'AUTH_SIGNUP':config.AUTH_SIGNUP})  
def signal_processing(request):
    return render(request, 'pages/signal-processing.html',{'PHP_HOST': config.PHP_HOST, 'AUTH_LOGIN':config.AUTH_LOGIN,'AUTH_SIGNUP':config.AUTH_SIGNUP})  
def statistics(request):
    return render(request, 'pages/statistics.html',{'PHP_HOST': config.PHP_HOST, 'AUTH_LOGIN':config.AUTH_LOGIN,'AUTH_SIGNUP':config.AUTH_SIGNUP})   
def software_engineering(request):
    return render(request, 'pages/software-engineering-1.html',{'PHP_HOST': config.PHP_HOST, 'AUTH_LOGIN':config.AUTH_LOGIN,'AUTH_SIGNUP':config.AUTH_SIGNUP})   
def nlp_processing(request):
    return render(request, 'pages/nlp-processing.html',{'PHP_HOST': config.PHP_HOST, 'AUTH_LOGIN':config.AUTH_LOGIN,'AUTH_SIGNUP':config.AUTH_SIGNUP})  
def web_development(request):
    return render(request, 'pages/web-development.html',{'PHP_HOST': config.PHP_HOST, 'AUTH_LOGIN':config.AUTH_LOGIN,'AUTH_SIGNUP':config.AUTH_SIGNUP})    
