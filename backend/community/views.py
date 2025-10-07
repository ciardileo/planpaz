from django.shortcuts import render
from rest_framework import generics, status
from rest_framework.views import APIView
from rest_framework.response import Response
from .models import Post
from users.models import User
from .serializers import PostSerializer
from rest_framework.permissions import IsAuthenticatedOrReadOnly

class PostListCreate(generics.ListCreateAPIView):
    serializer_class = PostSerializer
    # permission_classes = [IsAuthenticatedOrReadOnly]

    def get_queryset(self):
        author_username = self.request.query_params.get("author")
        if author_username:
            return Post.objects.filter(author__username=author_username)
        return Post.objects.all()  # avoid returning all posts accidentally

    def perform_create(self, serializer):
        serializer.save(author=self.request.user)

    
class PostRetrieveUpdateDestroy(generics.RetrieveUpdateDestroyAPIView):
    queryset = Post.objects.all()
    serializer_class = PostSerializer
    lookup_field = "pk"
    
