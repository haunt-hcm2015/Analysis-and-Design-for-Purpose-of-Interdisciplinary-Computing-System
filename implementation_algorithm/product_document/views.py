from django.shortcuts import render
  
def product_documentation(request):
    return render(request, 'pages/product-documentation.html')  
