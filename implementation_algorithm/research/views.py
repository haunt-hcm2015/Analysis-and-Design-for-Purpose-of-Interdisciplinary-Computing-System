from django.shortcuts import render
from technology import config
def algorithm(request):
    return render(request, 'pages/algorithm.html',{'PHP_HOST': config.PHP_HOST})  
def artificial_intelligence(request):
    return render(request, 'pages/artificial-intelligence.html',{'PHP_HOST': config.PHP_HOST})  
def vr_ar(request):
    return render(request, 'pages/vr-ar.html',{'PHP_HOST': config.PHP_HOST})  
def computer_science(request):
    return render(request, 'pages/computer-science.html',{'PHP_HOST': config.PHP_HOST})   
def software_engineering(request):
    return render(request, 'pages/software-engineering-2.html',{'PHP_HOST': config.PHP_HOST})  
def system_information(request):
    return render(request, 'pages/system-information.html',{'PHP_HOST': config.PHP_HOST})  

