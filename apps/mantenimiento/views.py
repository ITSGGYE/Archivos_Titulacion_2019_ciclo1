from django.shortcuts import render, redirect,render_to_response
from django.contrib import messages;
from django.http import HttpResponse
from django.urls import reverse_lazy
from .models import AnioLectivo, Curso, Asignatura
from django.views.generic import ListView, CreateView, UpdateView, DeleteView
from .forms import AnioLectivoForm,CursoForm,AsignaturaForm
from django.contrib.messages.views import SuccessMessageMixin
from django.core import serializers
import json
from django.http import JsonResponse
from django.views.decorators.csrf import csrf_exempt
from django.core import serializers 
# Create your views here.

def  CrearCursoLectivo(request):
    return render(request,'mantenimiento/anioLectivo_form.html')

def CrearCurso(request):
    #form = CursoForm()
    return render(request, 'mantenimiento/curso_form.html')




def CrearAsignatura(request):
    return render(request,'mantenimiento/asignatura_form.html')





#Obtiene los anio Lectivo para ajax
def getAnioLectivo(request):
    lectivo = serializers.serialize('json',AnioLectivo.objects.all())
    return HttpResponse(lectivo,content_type='application/json')
    
#ajax

@csrf_exempt
def guardarCurso(request):

    nombreCurso = request.POST.get('nombreCurso')
    idAnioLectivo = request.POST.get('idAnioLectivo')

    obj = Curso(descripcion=nombreCurso,anioLectivo_id=idAnioLectivo)
    obj.save()
    
    return JsonResponse({'content': {'message' : 'ok'}})


@csrf_exempt
def guardarAsignatura(request):

    nombreAsignatura = request.POST.get('nombreAsignatura')
  

    obj = Asignatura(descripcion=nombreAsignatura)
    obj.save()
    
    return JsonResponse({'content': {'message' : 'ok'}})


@csrf_exempt
def guardarAnioLectivo(request):

    descripcion = request.POST.get('descripcion')
  

    obj = AnioLectivo(descripcion=descripcion)
    obj.save()
    
    return JsonResponse({'content': {'message' : 'ok'}})