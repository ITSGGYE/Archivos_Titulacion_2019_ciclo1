from django.shortcuts import render, HttpResponse, HttpResponseRedirect, render_to_response,redirect
from django.http import JsonResponse
from .models import Pregunta, Repuesta, RespCalificacion,EstuStatusCalificacion,DocStatusCalificacion
from apps.mantenimiento.models import Persona
from apps.asignacion.models import DocenteCursoMateria
from django.core import serializers
import json
from django.views.decorators.csrf import csrf_exempt
# Create your views here.

def Calificar(request,id,idpersona):    
    tmp = DocenteCursoMateria.objects.filter(cursoMateria_id=id).first()
    response = Repuesta.objects.all()
    preguntas =[]
    
    if idpersona is 1 :
        preguntas = Pregunta.objects.filter(tipoEvaluacion_id=1)
    return render(request,'calificacion/estu_cali_docente.html', {'datos' : tmp, 'preguntas' : preguntas,
    'response' : response})

    def post(self, request, *args, **kwargs):
        return redirect('home')

#AutoEvaluacion del docente
def Calificar_Autovaluacion(request,id):   
    response = Repuesta.objects.all()
    preguntas = Pregunta.objects.filter(tipoEvaluacion_id=id)
    persona =  request.user.Persona
    return render(request,'calificacion/doc_autoevaluacion.html', {'preguntas':preguntas, 'response': response
    , 'docente' : persona})

def Calificar_EPP(request,idDocente):
    preguntas = Pregunta.objects.filter(tipoEvaluacion_id=4)
    response = Repuesta.objects.all()
    persona = Persona.objects.filter(id=idDocente).first()
    return render(request, 'calificacion/doc_EPP.html',{'preguntas': preguntas ,
    'response' : response,'docente' : persona})

def Calificar_EDD(request,idDocente):
    preguntas = Pregunta.objects.filter(tipoEvaluacion_id=3)
    response = Repuesta.objects.all()
    persona = Persona.objects.filter(id=idDocente).first()
    return render(request, 'calificacion/doc_EDD.html',{'preguntas': preguntas ,
    'response' : response,'docente' : persona})

@csrf_exempt
def guardar(request):
    if request.method == "POST":
        calificador1 = request.POST.get('calificador')
        calificado1 = request.POST.get('calificado')
        pregunta1 = request.POST.get('pregunta')
        promedio1 = request.POST.get('promedio')
        idtmp1  = request.POST.get('idtmp')
        per = Persona.objects.filter(pk=calificador1).first()
        pre = pregunta1
        obj = RespCalificacion(calificador_id=calificador1,calificado_id=calificado1,
        evaluacion_id=pregunta1,promedio=promedio1)
        obj.save()
        # valida el tipo de persona para limitar la calificacion
        if per.tipoPersona_id is 1:
            stuUpdate = EstuStatusCalificacion.objects.filter(estudiante_id=calificador1)
            stuUpdate = stuUpdate.filter(materia_id=idtmp1).first()
            stuUpdate.estado = True
            stuUpdate.save()
        if per.tipoPersona_id is 2:
            if pregunta1 is 4:
               hola = "hola"
            else:
                docStatus = DocStatusCalificacion.objects.filter(evaluacion_id=2)
                docStatus = docStatus.filter(calificador_id=calificador1).first()
                docStatus.estado = True
                docStatus.save()
        if per.tipoPersona_id is 4:
            docStatus = DocStatusCalificacion.objects.filter(evaluacion_id=3)
            docStatus = docStatus.filter(calificado_id=calificado1).first()
            docStatus.estado = True
            docStatus.save()


        return JsonResponse({'content': {'message': 'ok'}})

    else:
        return render(request, 'calificacion/estu_cali_docente', {'form': form} )

@csrf_exempt
def guardarEstudiante(request):
    if request.method == "POST":
        calificador1 = request.POST.get('calificador')
        calificado1 = request.POST.get('calificado')
        pregunta1 = request.POST.get('pregunta')
        promedio1 = request.POST.get('promedio')
        idtmp1  = request.POST.get('idtmp')
        per = Persona.objects.filter(pk=calificador1).first()
        pre = pregunta1
        obj = RespCalificacion(calificador_id=calificador1,calificado_id=calificado1,
        evaluacion_id=pregunta1,promedio=promedio1)
        obj.save()

        stuUpdate = EstuStatusCalificacion.objects.filter(estudiante_id=calificador1)
        stuUpdate = stuUpdate.filter(materia_id=idtmp1).first()
        stuUpdate.estado = True
        stuUpdate.save()

        return JsonResponse({'content': {'message': 'ok'}})

    else:
        return render(request, 'calificacion/estu_cali_docente', {'form': form} )


@csrf_exempt
def guardarEPP(request):
    if request.method == "POST":
        calificador1 = request.POST.get('calificador')
        calificado1 = request.POST.get('calificado')
        pregunta1 = request.POST.get('pregunta')
        promedio1 = request.POST.get('promedio')
        idtmp1  = request.POST.get('idtmp')
        per = Persona.objects.filter(pk=calificador1).first()
        pre = pregunta1
        obj = RespCalificacion(calificador_id=calificador1,calificado_id=calificado1,
        evaluacion_id=pregunta1,promedio=promedio1)
        obj.save()

        return JsonResponse({'content': {'message': 'ok'}})

    else:
        return render(request, 'calificacion/estu_cali_docente', {'form': form} )


@csrf_exempt
def guardarAutoevaluacion(request):
    if request.method == "POST":
        calificador1 = request.POST.get('calificador')
        calificado1 = request.POST.get('calificado')
        pregunta1 = request.POST.get('pregunta')
        promedio1 = request.POST.get('promedio')
        idtmp1  = request.POST.get('idtmp')
        per = Persona.objects.filter(pk=calificador1).first()
        pre = pregunta1
        obj = RespCalificacion(calificador_id=calificador1,calificado_id=calificado1,
        evaluacion_id=pregunta1,promedio=promedio1)
        obj.save()

        docStatus = DocStatusCalificacion.objects.filter(evaluacion_id=2)
        docStatus = docStatus.filter(calificador_id=calificador1).first()
        docStatus.estado = True
        docStatus.save()
        return JsonResponse({'content': {'message': 'ok'}})

    else:
        return render(request, 'calificacion/estu_cali_docente', {'form': form} )


@csrf_exempt
def guardarEDD(request):
    if request.method == "POST":
        calificador1 = request.POST.get('calificador')
        calificado1 = request.POST.get('calificado')
        pregunta1 = request.POST.get('pregunta')
        promedio1 = request.POST.get('promedio')
        idtmp1  = request.POST.get('idtmp')
        per = Persona.objects.filter(pk=calificador1).first()
        pre = pregunta1
        obj = RespCalificacion(calificador_id=calificador1,calificado_id=calificado1,
        evaluacion_id=pregunta1,promedio=promedio1)
        obj.save()

        docStatus = DocStatusCalificacion.objects.filter(evaluacion_id=3)
        docStatus = docStatus.filter(calificado_id=calificado1).first()
        docStatus.estado = True
        docStatus.save()
        return JsonResponse({'content': {'message': 'ok'}})

    else:
        return render(request, 'calificacion/estu_cali_docente', {'form': form} )