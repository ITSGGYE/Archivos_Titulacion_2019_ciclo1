from django.urls import path
from .views import EstudianteCurso , AsignarMatCurso , DocenteCurso,DocenteAsiDocente,ListadoDocenteCalificar

url_asignacion= [
    path('materiacursos/', AsignarMatCurso.as_view(), name='materiacurso'),
    path('estudiantecursos/', EstudianteCurso.as_view(), name='estudiantecurso'),
    path('docentecursos/' , DocenteCurso.as_view(), name='docentecurso'),
    path('docentasigdocente/', DocenteAsiDocente.as_view(), name='docasidocente'),
    path('listadodocentes/<int:id>',ListadoDocenteCalificar,name='listadoDocentes'),
]