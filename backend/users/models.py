from django.db import models
from django.contrib.auth.models import AbstractUser

# Create your models here.
class Country(models.Model):
    name = models.CharField(max_length=100)
    
    def __str__(self):
        return self.name
    

class User(AbstractUser):
    birthdate = models.DateField(null=True, blank=True)
    country = models.ForeignKey(Country, on_delete=models.SET_NULL, null=True, blank=True)
    bio = models.TextField(null=True, blank=True)
    profile_pic = models.ImageField(upload_to="profile_pics/", null=True, blank=True)
    verified = models.BooleanField(default=False)
    score = models.IntegerField(default=0)

    
    def __str__(self):
        return self.username

