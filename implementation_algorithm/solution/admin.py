from django.contrib import admin
from .models import Field

class FieldAdmin(admin.ModelAdmin):
    list_display  = ['field_name', 'description', 'created', 'updated']
    list_filter   = ['field_name']
    search_fields = ['field_name', 'description']
    readonly_fields = ['image_tag']


admin.site.register(Field, FieldAdmin)
admin.site.site_header = "AI Solution Portal"
admin.site.site_title = "AI Solution Portal"
admin.site.index_title = "Welcome to AI Solution Portal"
