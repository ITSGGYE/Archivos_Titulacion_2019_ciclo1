from django.urls import path
from .views import CrearCursoLectivo, CrearCurso, CrearAsignatura,getAnioLectivo,guardarCurso \
    ,guardarAsignatura, guardarAnioLectivo

url_mantenimiento = [
    path('nuevoaniolectivo/', CrearCursoLectivo, name= 'crearLectivo'),
    path('nuevocurso/', CrearCurso , name='crearCurso'),
    path('nuevoasignatura/', CrearAsignatura, name='crearAsignatura'),
    path('listarcursos/',getAnioLectivo,name='listarcursos'),
    path('guardarCursos/',guardarCurso,name='guardarCursos'),
    path('guardarAsignatura/',guardarAsignatura,name='guardarAsignatura'),
    path('guardarAnioLectivo/',guardarAnioLectivo,name='guardarAnioLectivo'),
]