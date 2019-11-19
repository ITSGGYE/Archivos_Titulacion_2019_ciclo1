from django.db import models
from django.contrib.auth.models import AbstractUser
from apps.mantenimiento.models import Persona, TipoPersonas
# Create your models here.



class User(AbstractUser):
    Persona = models.ForeignKey(Persona,null= True, blank= True,  on_delete=models.CASCADE)