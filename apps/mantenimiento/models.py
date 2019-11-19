from django.db import models

# Create your models here.
class AnioLectivo(models.Model):
    descripcion = models.CharField(max_length=10, verbose_name='Periodo',default='')

    class Meta:
        verbose_name = 'Año Lectivo'
        verbose_name_plural = 'Año Lectivo'
    
    def __str__(self):
        return self.descripcion

class TipoPersonas(models.Model):
    descripcion = models.CharField(max_length=20,default='')
    estado = models.BooleanField(default=True)

    class Meta:
        verbose_name = "Tipo de persona"
        verbose_name_plural = "Tipos de Personas"

    def __str__ (self):
        return self.descripcion

class PersonaManager(models.Manager):
    def by_get_estudiante(self):
        return self.filter(tipoPersona_id=1)

class Persona(models.Model):
    cedula  = models.CharField(max_length=20,verbose_name='# Cedula', blank=True, unique=True)
    tipoPersona = models.ForeignKey(TipoPersonas,on_delete=models.CASCADE, blank=True, null=True)
    nombres = models.CharField(max_length=20, blank=True)
    apellidos = models.CharField(max_length=20, blank=True)
    direccion =models.CharField(max_length=50,blank=True)
    
    objects = PersonaManager()
    class Meta:
        verbose_name = "Persona"
        verbose_name_plural = "Personas"
    
    def __str__(self):
        return self.nombres + " " +self.apellidos

class Curso(models.Model):
    descripcion = models.CharField(max_length=50,verbose_name='Nombre')
    anioLectivo = models.ForeignKey(AnioLectivo,on_delete=models.CASCADE)
    estado = models.BooleanField(default=True)

    class Meta:
        verbose_name = 'Curso'
        verbose_name_plural = 'Curso'
    
    def __str__(self):
        return self.descripcion

class Asignatura(models.Model):
    descripcion = models.CharField(max_length=50,verbose_name='Nombre')
    estado = models.BooleanField(default=True)

    class Meta:
        verbose_name = 'Asignatura'
        verbose_name_plural = 'Asignaturas'

    def __str__(self):
        return self.descripcion
          

class Periodo(models.Model):
    descripcion = models.TextField()