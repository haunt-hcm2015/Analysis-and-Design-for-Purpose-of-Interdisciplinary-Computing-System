from django.shortcuts import render

def ai_language(request):
    return render(request, 'pages/ai-language.html')
def ai_cloud(request):
    return render(request, 'pages/ai-cloud.html')
def ai_natural_language_understanding(request):
    return render(request, 'pages/ai-natural-language-understanding.html')
def ai_digital_map(request):
    return render(request, 'pages/ai-digital-map.html')
def product_documentation(request):
    return render(request, 'pages/product-documentation.html')  

