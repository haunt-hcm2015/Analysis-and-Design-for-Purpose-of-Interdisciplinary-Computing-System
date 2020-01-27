from django import template

register = template.Library()

@register.simple_tag
def convertTextToLink(text):
    text = text.lower()
    text = text.replace(' ', '-')
    text = text + '.html'
    return text