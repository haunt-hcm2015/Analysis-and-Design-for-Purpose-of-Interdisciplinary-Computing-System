#! -*- coding: utf-8 -*-
from django.shortcuts import render
import requests
import os
import json
from django.core.files.storage import FileSystemStorage
def compiler(request):
	BASE_DIR = os.path.dirname(os.path.dirname(__file__))
	context = {}
	RUN_URL = u'https://api.hackerearth.com/v3/code/run/'
	CLIENT_SECRET = '446dfe1ba9fb4fd1f71800888bebb414647641ca'
	programmingLanguage = ''
	if request.method == 'POST':
		programmingLanguage = request.POST.get('programming_language')	
		if 'sourceFile' in request.FILES:
			_sourceFile = request.FILES['sourceFile']
			fs = FileSystemStorage()
			name = fs.save(_sourceFile.name, _sourceFile)
			context['source_url'] = fs.url(name)
			mediaPath = os.path.join(BASE_DIR, 'media')
			fullPath =os.path.join(mediaPath, _sourceFile.name)
			_sourceCode = open(fullPath, 'r', encoding="utf-8")
			sourceCode = _sourceCode.read()
			data = {
				'client_secret': CLIENT_SECRET,
				'async': 0,
				'source': sourceCode,
				'lang': programmingLanguage,
				'time_limit': 5,
				'memory_limit': 262144,
			}
			_sourceCode.close()
		else:
			sourceCode = request.POST.get('source_code')	
			data = {
				'client_secret': CLIENT_SECRET,
				'async': 0,
				'source': sourceCode,
				'lang': programmingLanguage,
				'time_limit': 5,
				'memory_limit': 262144,
			}
		r = requests.post(RUN_URL, data=data)
		jsonResult = r.json()
		context['sourcecode'] = sourceCode
		context['status'] = jsonResult['run_status']['status']
		context['status_detail'] = jsonResult['run_status']['status_detail']
		context['compile_status'] = jsonResult['compile_status']
		if 'output' in jsonResult['run_status']:
			context['output'] = jsonResult['run_status']['output']
			context['memory_used'] = jsonResult['run_status']['memory_used']

	return render(request, 'compiler.html', context)
