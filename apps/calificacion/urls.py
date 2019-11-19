from django.urls import path
from .views import Calificar,guardar ,Calificar_Autovaluacion,Calificar_EPP,Calificar_EDD, guardarEstudiante \
    ,guardarAutoevaluacion,guardarEDD,guardarEPP
url_calificacion = [
    path('calificar/<int:id>/<int:idpersona>/', Calificar , name='calificar_profesor'),
    path('guardar/',guardar,name='guardarCalificacion'),
    path('calificar/<int:id>/', Calificar_Autovaluacion , name='calificar_autoevaluacion'),
    path('calificarepp/<int:idDocente>/', Calificar_EPP , name='calificar_epp'),
    path('calificaredd/<int:idDocente>/', Calificar_EDD , name='calificar_edd'),
    path('guardarEstudiante/',guardarEstudiante,name='guardarEstudiante'),
    path('guardarAutoevaluacion/',guardarAutoevaluacion,name='guardarAutoevaluacion'),
    path('guardarEDD/',guardarEDD,name='guardarEDD'),
    path('guardarEPP/',guardarEPP,name='guardarEPP'),

]