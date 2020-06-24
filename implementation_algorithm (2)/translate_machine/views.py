from django.shortcuts import render
from django.core.files.storage import FileSystemStorage
import os
from googletrans import Translator
def translateText(sourceText, src, dest):
    translator = Translator()
    result = translator.translate(sourceText, src=src, dest=dest)
    return result
def translate(request):
    BASE_DIR = os.path.dirname(os.path.dirname(__file__))
    context = {}
    sourceText = ''
    fileResource = None
    if request.method == 'POST':
        src = request.POST.get('language_source')
        dest = request.POST.get('language_destination')
        sourceText = request.POST.get('source_text')
        
        if 'fileSource' in request.FILES:
            fileResource = request.FILES['fileSource']
            fs = FileSystemStorage()
            fileText = fs.save(fileResource.name, fileResource)
            context['fileUrl'] = fs.url(fileText)
            mediaPath = os.path.join(BASE_DIR,'media')
            fullPath =os.path.join(mediaPath,fileResource.name)
            fileContent = open(fullPath, 'r')
            context['sourceText'] = fileContent.read()
            translateResult = translateText(context['sourceText'], src, dest)
            context['sourceTranslate'] = translateResult.origin
            context['resultTranslate'] = translateResult.text
        else:
            translateResult = translateText(sourceText, src, dest)
            context['src'] = translateResult.src 
            context['dest'] = translateResult.dest
            context['sourceTranslate'] = translateResult.origin
            context['resultTranslate'] = translateResult.text
    return render(request, 'translate.html', context)