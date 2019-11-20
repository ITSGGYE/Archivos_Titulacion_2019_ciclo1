# -*- coding: utf-8 -*-
from __future__ import unicode_literals

from django.shortcuts import render, redirect
from django.contrib.auth.decorators import login_required
from django.urls import reverse
from django.contrib.auth import authenticate, login as logindjango,logout as logoutdjango
from django.contrib import messages
from tesis_school.accounts.models import *

# Create your views here.
def login(request):
	username=str(request.POST.get('username', False))
	password=str(request.POST.get('password', False))
	context=" "
	if request.method == 'POST':
		usuario = username
		contrasena = password
		user = authenticate(username=usuario, password=contrasena)
		if user is not None:
			if user.is_active:  
				logindjango(request, user)
				return redirect(reverse('index'))
			else:
				context="error"
				messages.error(request, 'El usuario se encuentra inactivo.')
		else:
			context="error"
			messages.error(request, 'El usuario y/o la contraseña no son válidos.')
	return render(request,'accounts/templates/new-page-login.html', {"context":context})

def logout(request):
	logoutdjango(request)
	return redirect(reverse('login'))
