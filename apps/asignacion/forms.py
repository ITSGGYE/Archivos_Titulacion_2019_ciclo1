from apps.mantenimiento.models import AnioLectivo, Curso, Asignatura, Persona
from .models import AsignaturaCurso, CursoEstudiante, DocenteCursoMateria, DocenteCalDocente
from django import forms 

class AsignurataCursoForm(forms.ModelForm):
    class Meta:
        model = AsignaturaCurso
        fields = [
            'asignatura',
            'curso',
        ]
        widgets = {
            'asignatura' : forms.Select(attrs={'class' : 'form-control'}),
            'curso' : forms.Select(attrs={'class' : 'form-control'}),
        }

class EstudianteCursoForm(forms.ModelForm):
    def __init__(self, *args , **kwargs):
            super(EstudianteCursoForm, self).__init__(*args, ** kwargs)
            #self.model['estudiante'].queryset = Persona.objects.filter(tipoPersona_id=1)
            self.fields['estudiante'].queryset = Persona.objects.filter(tipoPersona_id=1)
    class Meta:       
        model = CursoEstudiante
        fields = [
            'estudiante',
            'curso',
        ]
        widgets = {
            'estudiante' : forms.Select(attrs={'class' : 'form-control'}),
            'curso' : forms.Select(attrs={'class' : 'form-control'}),
        }

class DocenteMatCursoForm(forms.ModelForm):
    def __init__(self, *args , **kwargs):
            super(DocenteMatCursoForm, self).__init__(*args, ** kwargs)
            #self.model['estudiante'].queryset = Persona.objects.filter(tipoPersona_id=1)
            self.fields['docente'].queryset = Persona.objects.filter(tipoPersona_id=2)
    class Meta:
        model = DocenteCursoMateria
        fields = [
           'docente',
           'cursoMateria',
        ]
        widgets = {
            'docente' : forms.Select(attrs={'class' : 'form-control'}),
            'cursoMateria' : forms.Select(attrs={'class' : 'form-control'}),
       }

class DocenteCalDocenteForm(forms.ModelForm):
    def __init__(self, *args , **kwargs):
            super(DocenteCalDocenteForm, self).__init__(*args, ** kwargs)
            #self.model['estudiante'].queryset = Persona.objects.filter(tipoPersona_id=1)
            self.fields['docenteCalificador'].queryset = Persona.objects.filter(tipoPersona_id=2)
            self.fields['profesorCalificado'].queryset = Persona.objects.filter(tipoPersona_id=2)
    class Meta:
        model = DocenteCalDocente
        fields = [
            'docenteCalificador',
            'profesorCalificado',
        ]
        widgets = {
            'docenteCalificador' : forms.Select(attrs={'class' : 'form-control'}),
            'profesorCalificado' : forms.Select(attrs={'class' : 'form-control'}),
        }
