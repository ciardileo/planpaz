from django.urls import path
from .views import UserListCreate

urlpatterns = [
    path("api/", UserListCreate.as_view(), name="user-create-view"),
]
