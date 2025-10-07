# file for creating the models serializers for JSON

from rest_framework import serializers
from .models import Post

class PostSerializer(serializers.ModelSerializer):
    class Meta:
        model = Post
        fields = ["id", "title", "author", "content", "image", "published_date"]