# user serializer

from rest_framework import serializers
from .models import User

class UserSerializer(serializers.ModelSerializer):
    class Meta:
        model = User
        fields = ["id", "first_name", "username", "password", "country", "bio", "profile_pic", "verified", "score"]