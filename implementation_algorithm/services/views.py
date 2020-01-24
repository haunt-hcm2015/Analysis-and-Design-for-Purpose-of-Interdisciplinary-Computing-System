from django.shortcuts import render
from technology import config
  
def ai_programming_script(request):
    return render(request, 'pages/ai-programming-script.html', {'PHP_HOST': config.PHP_HOST})   
def ai_api(request):
    return render(request, 'pages/ai-api.html', {'PHP_HOST': config.PHP_HOST})  
def analysis_api(request):
    return render(request, 'pages/analysis-api.html', {'PHP_HOST': config.PHP_HOST})  
def data_repository(request):
    return render(request, 'pages/data-repository.html', {'PHP_HOST': config.PHP_HOST})  
def data_virtualization(request):
    return render(request, 'pages/data-virtualization.html', {'PHP_HOST': config.PHP_HOST})  
def programming_lab(request):
    return render(request, 'pages/programming-lab.html', {'PHP_HOST': config.PHP_HOST})   
def mathematical_lab(request):
    return render(request, 'pages/mathematical-lab.html', {'PHP_HOST': config.PHP_HOST})   

