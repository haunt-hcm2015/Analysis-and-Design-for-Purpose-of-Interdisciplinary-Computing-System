from django.shortcuts import render, get_object_or_404
from .models import Field
from technology import config
'''
class DictList(dict):
    def __setitem__(self, key, value):
        try:
            self[key].append(value)
        except KeyError: 
            super(DictList, self).__setitem__(key, value)
        except AttributeError:
            super(DictList, self).__setitem__(key, [self[key], value])
class _obj:
    def __init__(self, name):
        self.field_name = name 
'''

def computational_interdisciplinary(request):
    data = {'areaOfApplication' : Field.objects.all(), 'PHP_HOST': config.PHP_HOST}
    return render(request, 'pages/computational-interdisciplinary.html',data)
def computing_image_processing(request):
    data = {'PHP_HOST': config.PHP_HOST}
    return render(request, 'pages/computational-interdisciplinary/image-processing.html', data)
def computing_video_processing(request):
    data = {'PHP_HOST': config.PHP_HOST}
    return render(request, 'pages/computational-interdisciplinary/video-processing.html', data)
def aerospace_engineering_and_defense(request):
    return render(request, 'pages/aerospace-engineering-and-defense.html',{'PHP_HOST': config.PHP_HOST})
def automotive_engineering(request):
    return render(request, 'pages/automotive-engineering.html',{'PHP_HOST': config.PHP_HOST})
def chemical_engineering(request):
    return render(request, 'pages/chemical-engineering.html',{'PHP_HOST': config.PHP_HOST})
def control_systems(request):
    return render(request, 'pages/control-systems.html',{'PHP_HOST': config.PHP_HOST})
def data_science(request):
    return render(request, 'pages/data-science.html',{'PHP_HOST': config.PHP_HOST})
def electrical_engineering(request):
    return render(request, 'pages/electrical-engineering.html',{'PHP_HOST': config.PHP_HOST})   
def image_processing(request):
    return render(request, 'pages/image-processing.html',{'PHP_HOST': config.PHP_HOST})  
def video_processing(request):
    return render(request, 'pages/video-processing.html',{'PHP_HOST': config.PHP_HOST})  
def industrial_engineering(request):
    return render(request, 'pages/industrial-engineering.html',{'PHP_HOST': config.PHP_HOST})  
def signal_processing(request):
    return render(request, 'pages/signal-processing.html',{'PHP_HOST': config.PHP_HOST})  
def statistics(request):
    return render(request, 'pages/statistics.html',{'PHP_HOST': config.PHP_HOST})   
def software_engineering(request):
    return render(request, 'pages/software-engineering-1.html',{'PHP_HOST': config.PHP_HOST})   
def nlp_processing(request):
    return render(request, 'pages/nlp-processing.html',{'PHP_HOST': config.PHP_HOST})  
def web_development(request):
    return render(request, 'pages/web-development.html',{'PHP_HOST': config.PHP_HOST})    
