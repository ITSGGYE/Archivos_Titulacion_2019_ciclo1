from django.db import models
from apps.mantenimiento.models import Persona,Asignatura

# Create your models here.

class TipoEvaluacion(models.Model):
    descripcion = models.CharField(max_length=100,verbose_name='Pregunta',default='')

    class Meta:
        verbose_name = 'Tipo de Evaluacion'
        verbose_name_plural = 'Tipos de Evaluacion'
        ordering = ['id']

    def __str__(self):
        return self.descripcion


class Pregunta(models.Model):
    descripcion = models.CharField(max_length=500,verbose_name='Pregunta',default='')
    tipoEvaluacion = models.ForeignKey(TipoEvaluacion,on_delete=models.CASCADE,null=True,blank=True)
    estado = models.BooleanField(default=True)
    ispregunta = models.BooleanField(default=True)

    class Meta:
        verbose_name = 'Pregunta'
        verbose_name_plural = 'Preguntas'
        ordering = ['id']

    def __str__(self):
        return self.descripcion

class Repuesta(models.Model):
    descripcion = models.CharField(max_length=100,verbose_name='Pregunta',default='')
    valor = models.FloatField(default=0.25)
    estado = models.BooleanField(default=True)
    
    class Meta:
        verbose_name = 'Respuesta'
        verbose_name_plural = 'Respuestas'
        ordering = ['id']
    def __str__(self):
        return self.descripcion

class RespCalificacion(models.Model):
    calificador = models.ForeignKey(Persona,on_delete=models.CASCADE)
    calificado = models.ForeignKey(Persona ,related_name='%(class)s_request_created',on_delete=models.CASCADE)
    evaluacion = models.ForeignKey(TipoEvaluacion,on_delete=models.CASCADE)
    promedio = models.FloatField(default=0)


class EstuStatusCalificacion(models.Model):
    estudiante = models.ForeignKey(Persona,on_delete=models.CASCADE)
    materia = models.ForeignKey(Asignatura,on_delete=models.CASCADE)
    estado = models.BooleanField(default=False)


class DocStatusCalificacion(models.Model):
    calificador = models.ForeignKey(Persona,on_delete=models.CASCADE)
    calificado = models.ForeignKey(Persona ,related_name='%(class)s_request_created',on_delete=models.CASCADE)
    evaluacion = models.ForeignKey(TipoEvaluacion,on_delete=models.CASCADE)
    estado = models.BooleanField(default=False)
