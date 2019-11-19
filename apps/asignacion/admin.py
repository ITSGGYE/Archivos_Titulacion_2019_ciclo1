from django.contrib import admin
from .models import AsignaturaCurso, CursoEstudiante,DocenteCursoMateria,DocenteCalDocente
# Register your models here.



admin.site.register(AsignaturaCurso)
admin.site.register(CursoEstudiante)
admin.site.register(DocenteCursoMateria)
admin.site.register(DocenteCalDocente)