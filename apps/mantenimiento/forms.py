from .models import AnioLectivo, Curso, Asignatura
from django import forms

class AnioLectivoForm(forms.ModelForm):
    class Meta:
        model = AnioLectivo
        fields = [
            'descripcion',
        ]

class CursoForm(forms.ModelForm):
    class Meta:
        model = Curso
        anioLectivo = AnioLectivo.objects.all().order_by('descripcion')
        fields = [
            'descripcion',
            'anioLectivo',
        ]
        widgets = {
            'descripcion' : forms.TextInput(attrs={'class' : 'form-control'}),
            'anioLectivo' : forms.Select(choices=anioLectivo , attrs={'class' : 'form-control', 'id' : 'Lectivo'}),
        }

class AsignaturaForm(forms.ModelForm):
    class Meta:
        model = Asignatura
        fields = [
            'descripcion',
        ]

