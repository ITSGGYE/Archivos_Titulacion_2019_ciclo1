from django.contrib import admin
from .models import Pregunta, Repuesta, TipoEvaluacion
# Register your models here.

admin.site.register(Pregunta)
admin.site.register(Repuesta)
admin.site.register(TipoEvaluacion)
