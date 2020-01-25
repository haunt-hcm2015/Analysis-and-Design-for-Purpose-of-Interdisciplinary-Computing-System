from django.db import models
from django.utils.html import mark_safe

class Field(models.Model):
    field_name  = models.CharField(max_length=150, null=False, blank=False)
    description = models.TextField()
    image       = models.ImageField(null=True)
    created     = models.DateTimeField(auto_now_add=True)
    updated     = models.DateTimeField(auto_now=True) 
    def image_tag(self):
        return mark_safe('<img src="/media/%s" width="349px" />' % (self.image))
    image_tag.short_description = 'Image Show'
    def __unicode__(self):
        return self.field_name and self.description

