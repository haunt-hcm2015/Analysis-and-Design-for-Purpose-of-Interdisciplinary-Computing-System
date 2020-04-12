from django.conf import settings
from django.conf.urls.static import static
from django.contrib import admin
from django.urls import path, include
from blog_marketing.views import email_list_signup
from blog_post.views import (
    index,
    search,
    post_list,
    post_detail,
    post_create,
    post_update,
    post_delete,
    IndexView,
    PostListView,
    PostDetailView,
    PostCreateView,
    PostUpdateView,
    PostDeleteView
)


urlpatterns = [
    path('home/', IndexView.as_view(), name='blog/home'),
    path('post-list/', PostListView.as_view(), name='blog/post-list'),
    path('search/', search, name='search'),
    path('email-signup/', email_list_signup, name='email-signup'),
    path('post-create/', PostCreateView.as_view(), name='post-create'),
    path('post-detail/<pk>/', PostDetailView.as_view(), name='post-detail'),
    path('post-update/<pk>/update/', PostUpdateView.as_view(), name='post-update'),
    path('post-delete/<pk>/delete/', PostDeleteView.as_view(), name='post-delete'),
    path('tinymce/', include('tinymce.urls')),
    path('accounts/', include('allauth.urls'))
]

if settings.DEBUG:
    urlpatterns += static(settings.STATIC_URL,
                          document_root=settings.STATIC_ROOT)
    urlpatterns += static(settings.MEDIA_URL,
                          document_root=settings.MEDIA_ROOT)
