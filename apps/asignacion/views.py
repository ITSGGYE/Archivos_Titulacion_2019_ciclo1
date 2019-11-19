from django.shortcuts import render, redirect ,HttpResponseRedirect
from django.http import HttpResponse
from django.urls import reverse_lazy
from django.views.generic import ListView, CreateView, UpdateView , DeleteView
from apps.mantenimiento.models import AnioLectivo, Curso, Asignatura, Persona 
from .models import AsignaturaCurso, CursoEstudiante, DocenteCursoMateria,DocenteCalDocente
from .forms import AsignurataCursoForm, DocenteCalDocenteForm,DocenteMatCursoForm,EstudianteCursoForm
from apps.calificacion.models import EstuStatusCalificacion,DocStatusCalificacion
# Create your views here.
class AsignarMatCurso(CreateView):
    model = AsignaturaCurso
    form_class = AsignurataCursoForm
    template_name = 'asignacion/materia_curso_form.html'
    success_url = reverse_lazy('home')

class EstudianteCurso(CreateView):
    def get_form_kwargs(self):
        kwargs = super().get_form_kwargs()
        #kwargs.update({'request': self.request})
        return kwargs
    model = CursoEstudiante
    form_class = EstudianteCursoForm
    template_name = 'asignacion/estudiante_curso_form.html'
   # queryset = Persona.objects.filter(id=1)
    success_url = reverse_lazy('home')

    def get_context_data(self , **kwargs):
        context = super(EstudianteCurso, self).get_context_data(**kwargs)
        if 'form' not in context:
            context['form'] = self.form_class(self.request.GET)
        return context

    def post(self, request , *args, **kwargs):
        self.object = self.get_object
        form = self.form_class(request.POST)

        if form.is_valid():
            idCurso = request.POST['curso']
            idEstudiante = request.POST['estudiante']
            asiCurso = AsignaturaCurso.objects.filter(curso_id=idCurso)
            for asignatura in asiCurso:
                obj1 = EstuStatusCalificacion(estudiante_id=idEstudiante,materia_id=asignatura.id)
                obj1.save()           
            form.save()
            return HttpResponseRedirect(self.get_success_url())
        else:
            return self.render_to_response(self.get_context_data(form=form))

class DocenteCurso(CreateView):
    model = DocenteCursoMateria
    form_class = DocenteMatCursoForm
    template_name = 'asignacion/docente_curso_form.html'
    success_url = reverse_lazy('home')
    

class DocenteAsiDocente(CreateView):
    model = DocenteCalDocente
    form_class = DocenteCalDocenteForm
    template_name = 'asignacion/doc_asig_docente_form.html'
    success_url = reverse_lazy('home')

    def get_context_data(self, **kwargs):
        context = super(DocenteAsiDocente, self).get_context_data(**kwargs)
        if 'form' not in context:
            context['form'] = self.form_class(self.request.GET)
        return context
    
    def post(self, request, *args, **kwargs):
        self.object = self.get_object
        form = self.form_class(request.POST)

        if form.is_valid():
            idCalificador = request.POST['docenteCalificador']
            idCalificado = request.POST['profesorCalificado']

            pers1 = Persona.objects.filter(id=idCalificador).first()
            pers2 = Persona.objects.filter(id=idCalificado).first()
            obj2 = DocStatusCalificacion(calificador_id=pers1.id,calificado_id=pers2.id,evaluacion_id=4)
            obj2.save()

            form.save()
            return HttpResponseRedirect(self.get_success_url())
        else:
            return self.render_to_response(self.get_context_data(form=form))




    

def ListadoDocenteCalificar(request,id):
    DocStatusCalificacion
    #filtro = DocenteCalDocente.objects.filter(docenteCalificador_id=request.user.Persona_id)
    filtro = DocStatusCalificacion.objects.filter(calificador_id=request.user.Persona_id).filter(evaluacion_id=4)
    #filtro = DocStatusCalificacion.objects.all()
    return render(request,'asignacion/listado_docente_calificar.html',{'listado' : filtro , 'tipoEvaluacion' : id})