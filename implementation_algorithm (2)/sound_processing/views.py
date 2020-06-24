from django.shortcuts import render
from django.core.files.storage import FileSystemStorage
def soundToText():
    pass
def audioRecognition():
    pass 
def sound_analysis(request):
    context = {}
    if request.method == 'POST' and request.FILES['soundFile']:
        sound = request.FILES['soundFile']
        fs = FileSystemStorage()
        fileSound = fs.save(sound.name, sound)
        context['soundUrl'] = fs.url(fileSound)
        context['soundName'] = sound.name
    return render(request, 'sound-analysis.html', context)
