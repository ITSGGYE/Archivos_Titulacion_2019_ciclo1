from django.db import models
from apps.mantenimiento.models import  Persona, Curso, Asignatura
# Create your models here.



class AsignaturaCurso(models.Model):
    curso = models.ForeignKey(Curso,on_delete=models.CASCADE)
    asignatura = models.ForeignKey(Asignatura,on_delete=models.CASCADE)

    class Meta:
        verbose_name = 'Asignar Materias a Curso'
        verbose_name_plural = 'Asignar Materias a los cur'
    def __str__(self):
        return self.curso.descripcion + "  " + self.asignatura.descripcion

class CursoEstudiante(models.Model):
    estudiante = models.ForeignKey(Persona,on_delete=models.CASCADE)
    curso = models.ForeignKey(Curso,on_delete=models.CASCADE)

    class Meta:
        verbose_name = 'Asignar Estudiante a curso'
        verbose_name_plural = 'Asignar Estudiante a cursos'

    def __str__(self):
        return self.curso.descripcion + " " + self.estudiante.nombres

class DocenteCursoMateria(models.Model):
    docente = models.ForeignKey(Persona,verbose_name = 'Docente', on_delete= models.CASCADE)
    cursoMateria = models.ForeignKey(AsignaturaCurso, verbose_name = 'Materia por Curso' , on_delete=models.CASCADE)

    class Meta:
        verbose_name = 'Asignar Materia al Docente'
        verbose_name_plural = 'Asignar Materia al Docente'

    def __str__(self):
        return self.docente.nombres  + "  " + self.cursoMateria.asignatura.descripcion 

class DocenteCalDocente(models.Model):
    docenteCalificador = models.ForeignKey(Persona,related_name='%(class)s_request_created' ,verbose_name='Docente que califica', on_delete=models.CASCADE)
    profesorCalificado = models.ForeignKey(Persona ,verbose_name='Docente que van a califica', on_delete=models.CASCADE)

    class Meta:
        verbose_name  = 'Calificacion entre docentes'
        verbose_name_plural = 'Calificacion entre docentes'
    def __str__(self):
        return self.docenteCalificador.nombres + " califica a : " + self.profesorCalificado.nombres

class Prueba(models.Model):
    nombre = models.TextField()
