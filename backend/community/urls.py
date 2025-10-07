from django.urls import path
from .views import PostListCreate, PostRetrieveUpdateDestroy

urlpatterns = [
    path("", PostListCreate.as_view(), name="post-view-create"),
    path("<int:pk>/", PostRetrieveUpdateDestroy.as_view(), name="update-post-view"),
]
