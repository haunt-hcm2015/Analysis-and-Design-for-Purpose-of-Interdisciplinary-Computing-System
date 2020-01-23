from django.shortcuts import render

def index(request):
    return render(request, 'pages/base.html')
def ai_language(request):
    return render(request, 'pages/base.html')
def ai_cloud(request):
    return render(request, 'pages/base.html')
def ai_natural_language_understanding(request):
    return render(request, 'pages/base.html')
def ai_digital_map(request):
    return render(request, 'pages/base.html')
def product_documentation(request):
    return render(request, 'pages/base.html')  

