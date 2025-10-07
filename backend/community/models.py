from django.db import models
import users.models as users

# Create your models here.
class Post(models.Model):
    title = models.CharField(max_length=100)
    author = models.ForeignKey(users.User, on_delete=models.CASCADE)
    content = models.TextField()
    published_date = models.DateTimeField(auto_now_add=True)
    image = models.ImageField(upload_to="posts_content/", null=True)
    
    def __str__(self):
        return self.title
    