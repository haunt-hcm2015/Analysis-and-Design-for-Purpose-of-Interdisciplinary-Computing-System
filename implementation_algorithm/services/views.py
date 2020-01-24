from django.shortcuts import render
  
def ai_programming_script(request):
    return render(request, 'pages/ai-programming-script.html')   
def ai_api(request):
    return render(request, 'pages/ai-api.html')  
def analysis_api(request):
    return render(request, 'pages/analysis-api.html')  
def data_repository(request):
    return render(request, 'pages/data-repository.html')  
def data_virtualization(request):
    return render(request, 'pages/data-virtualization.html')  
def programming_lab(request):
    return render(request, 'pages/programming-lab.html')   
def mathematical_lab(request):
    return render(request, 'pages/mathematical-lab.html')   

