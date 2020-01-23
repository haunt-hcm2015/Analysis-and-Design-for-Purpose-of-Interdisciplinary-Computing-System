from django.shortcuts import render

def index(request):
    return render(request, 'pages/base.html')   
def ai_programming_script(request):
    return render(request, 'pages/base.html')   
def ai_api(request):
    return render(request, 'pages/base.html')  
def analysis_api(request):
    return render(request, 'pages/base.html')  
def data_repository(request):
    return render(request, 'pages/base.html')  
def data_virtualization(request):
    return render(request, 'pages/base.html')  
def programming_lab(request):
    return render(request, 'pages/base.html')   
def mathematical_lab(request):
    return render(request, 'pages/base.html')   

