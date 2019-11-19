from django.shortcuts import render
from django.http import HttpResponseRedirect
from apps.useradmin.models import User
from django.contrib.auth.forms import UserCreationForm
from django.views.generic import CreateView
from django.urls import reverse_lazy
from .form import RegistroUsuario, RegistroPersona
from apps.mantenimiento.models import Persona
from apps.calificacion.models import DocStatusCalificacion
import json
from django.http import JsonResponse
from django.views.decorators.csrf import csrf_exempt
from django.core import serializers 
# Create your views here.

class RegistroUsuario(CreateView):
    model = User
    template_name = 'usuario/registrar.html'
    form_class = RegistroUsuario
    second_form_class = RegistroPersona
    
    success_url = reverse_lazy('home')

    def get_context_data(self , **kwargs):
        context = super(RegistroUsuario, self).get_context_data(**kwargs)
        if 'form' not in context:
            context['form'] = self.form_class(self.request.GET)
        if 'form2' not in context:
            context['form2'] = self.second_form_class(self.request.GET)
        return context
    
    def post(self, request, *args , **kwargs):
        self.object = self.get_object
        form = self.form_class(request.POST)
        form2 = self.second_form_class(request.POST)
        if form.is_valid() and form2.is_valid():
            usuario = form.save(commit=False)
            usuario.Persona = form2.save()
            usuario.first_name = request.POST['nombres']
            usuario.last_name = request.POST['apellidos']
            tipoUsuario = request.POST['tipoPersona']
            usuario.save()
            return HttpResponseRedirect(self.get_success_url())
        else:
            return self.render_to_response(self.get_context_data(form=form))


def listado_docentes(request,id):
    #docentes = Persona.objects.filter(tipoPersona_id=2)
    user_docentes = User.objects.filter(Persona__tipoPersona_id=id)
    title = ''
    if id is 1:
        title = 'Listado de Estudiantes'
    elif id is 2 :
        title = 'Listado de Docentes'
    elif id is 3:
        title = 'Listado de Administradores'
    else:
        title = 'Listado de Directivos'
    return render(request,'base/listado_docentes.html',{'docentes' : user_docentes, 'title': title
    , 'tipoPersona' : id})


def registrar_docente(request,id):
    title = ''
    if id is 1:
        title = 'Registrar Estudiante'
    elif id is 2 :
        title = 'Registrar Docente'
    elif id is 3:
        title = 'Registrar Admnistrativo'
    else:
        title = 'Registrar Directivo'

    return render(request,'usuario/registro_individual.html',{'title' : title, 'tipoPersona':id})


@csrf_exempt
def buscar_usuario(request):
    usert = request.POST.get('username')
    usuario = User.objects.filter(username=usert)

    mensaje = ''
    if not usuario:
        mensaje = '1'
    else:
        mensaje = '0'
    return JsonResponse({'content': {'message' : mensaje}})

@csrf_exempt
def guardar_usuario(request):

    cedula = request.POST.get('cedula')
    nombres = request.POST.get('nombres')
    apellidos = request.POST.get('apellidos')
    correo = request.POST.get('correo')
    username = request.POST.get('username')
    password1 = request.POST.get('password1')
    password2 =  request.POST.get('password2')
    tipoPersona = request.POST.get('tipoPersona')


    pers = Persona(cedula=cedula,nombres=nombres,apellidos=apellidos,direccion='',
                tipoPersona_id=tipoPersona)

    pers.save()
    idPersona = pers.id

    user = User.objects.create_user(username,correo,password1)
    user.Persona = pers
    user.first_name = nombres
    user.last_name = apellidos

    user.save()

    return JsonResponse({'content': {'message' : 'ok'}})