from .models  import User
from django.contrib.auth.forms import UserCreationForm
from django import forms
from apps.mantenimiento.models import Persona, TipoPersonas



class RegistroPersona(forms.ModelForm):
    class Meta:
        model = Persona
        tipoPersona = TipoPersonas.objects.all()
        fields = [
            'cedula',
            'tipoPersona',
            'nombres',
            'apellidos',
        ]
        labels = {
            'cedula' : 'identificacion',
            'tipoPersona' : 'Tipo de Persona',
            'nombres': 'Nombres',
            'apellidos': 'Apellidos',
        }
        widgets = {
            'cedula' : forms.TextInput(attrs={'class' : 'form-control'}),
            'tipoPersona' : forms.Select(choices=tipoPersona , attrs={'class' : 'form-control'}),
            'nombres' : forms.TextInput(attrs={'class' : 'form-control'}),
            'apellidos' : forms.TextInput(attrs={'class' : 'form-control'}),
        }
class RegistroUsuario(UserCreationForm):
   
    class Meta:
        model = User
        fields = [
            'first_name',
            'last_name',
            'email',
            'username',
        ]
        labels = {
            'first_name' : 'Primer Nombre',
            'last_name' : 'Primer Apellido',
            'email' : 'Correo Electronico',
            'username': 'Nombre de Usuario',
        }
        widgets = {
            'first_name' : forms.TextInput(attrs={'class' : 'form-control'}),
            'last_name' : forms.TextInput(attrs={'class' : 'form-control'}),
            'email' : forms.TextInput(attrs={'class' : 'form-control'}),
            'username' : forms.TextInput(attrs={'class' : 'form-control'}),
        }
