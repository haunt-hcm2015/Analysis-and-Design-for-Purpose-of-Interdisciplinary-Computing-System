from django.shortcuts import render

def algorithm(request):
    return render(request, 'pages/algorithm.html')  
def artificial_intelligence(request):
    return render(request, 'pages/artificial-intelligence.html')  
def vr_ar(request):
    return render(request, 'pages/vr-ar.html')  
def computer_science(request):
    return render(request, 'pages/computer-science.html')   
def software_engineering(request):
    return render(request, 'pages/software-engineering-2.html')  
def system_information(request):
    return render(request, 'pages/system-information.html')  

