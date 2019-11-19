from django.db import models
from apps.mantenimiento.models import Persona
from apps.calificacion.models import TipoEvaluacion
# Create your models here.



class TmpReporteCalificacion(models.Model):
    docente = models.ForeignKey(Persona,on_delete=models.CASCADE)
    promeEstudiante = models.DecimalField(max_digits=18,decimal_places=2)
    promeAutoevaluacion = models.DecimalField(max_digits=18,decimal_places=2)
    promeEDD= models.DecimalField(max_digits=18,decimal_places=2)
    promeEPP = models.DecimalField(max_digits=18,decimal_places=2)

    def __str__(self):
        return self.docente_nombres + self.docente_apellidos
