from django.urls import path
from .views import RegistroUsuario, listado_docentes, registrar_docente, guardar_usuario, buscar_usuario

url_usuario = [
    path('registrar/', RegistroUsuario.as_view(), name='registrar'),
    path('listado_docentes/<int:id>/', listado_docentes, name='listado_docentes'),
    path('registrar_docente/<int:id>/', registrar_docente, name='registrar_docente'),
    path('guardar_usuario/', guardar_usuario, name='guardar_usuario'),
     path('buscar_usuario/', buscar_usuario, name='buscar_usuario'),
]