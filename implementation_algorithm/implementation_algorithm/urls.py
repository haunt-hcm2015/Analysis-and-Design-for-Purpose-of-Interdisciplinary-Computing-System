from django.contrib import admin
from django.urls import path, include
from django.conf.urls import handler400, handler500, url
from django.conf.urls.static import static
from django.conf import settings
from django.views.static import serve


urlpatterns = [
    path('admin/',              admin.site.urls),
    path('technology/',         include('technology.urls')),
    path('bigdata/',            include('bigdata.urls')),
    path('solution/',           include('solution.urls')),
    path('services/',           include('services.urls')),
    path('research/',           include('research.urls')),
    path('geosystem/',          include('geosystem.urls')),
    path('translate-machine/',  include('translate_machine.urls')),
    path('testing-system/',     include('testing_system.urls')),
    path('image-processing/',   include('image_processing.urls')),
    path('sound-processing/',   include('sound_processing.urls')),
    path('video-processing/',   include('video_processing.urls')),
]
if settings.DEBUG:
    urlpatterns += static(settings.MEDIA_URL, document_root=settings.MEDIA_ROOT)
else:
    urlpatterns += [
        url(r'^media/(?P<path>.*)$', serve,{'document_root': settings.MEDIA_ROOT}),
    ]

#handler400 = 'views.error404'
#handler500 = 'views.error500'


