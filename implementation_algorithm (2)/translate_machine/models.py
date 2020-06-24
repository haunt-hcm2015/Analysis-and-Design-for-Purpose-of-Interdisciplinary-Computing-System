from django.db import models
from django import forms

LANGUAGE_CHOICES = [
    ('English', 'English'),
    ('Chinese', 'Chinese'),
    ('Japanese', 'Japanese'),
    ('Vietnamese', 'Vietnamese'),
    ('Afar', 'Afar'),
    ('Afrikaan', 'Afrikaan'),
    ('Akan', 'Akan'),
    ('Albanian', 'Albanian'),
    ('Amharic', 'Amharic'),
    ('Anii', 'Anii'),
]
class ProjectLanguageForm(forms.Form):
    language_name = forms.CharField(widget=forms.Select(choices=LANGUAGE_CHOICES), label='Select Language')
    language_sentences = forms.CharField(widget=forms.Textarea, label='Language')
    language_dest = forms.CharField(widget=forms.Select(choices=LANGUAGE_CHOICES), label='Select Language Destination')
    translate_result = forms.CharField(widget=forms.Textarea, label='Language Destination')
    file_choose = forms.FileField(label='Upload Interpreter File')
    def __str__(self):
        return 'Translation Machine'
