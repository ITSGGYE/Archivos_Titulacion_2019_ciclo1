from django.contrib import admin
from .models import Persona, TipoPersonas, Curso, AnioLectivo,Asignatura
# Register your models here.

admin.site.register(Persona)
admin.site.register(TipoPersonas)
admin.site.register(AnioLectivo)
admin.site.register(Asignatura)
admin.site.register(Curso)
