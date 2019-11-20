# -*- coding: utf-8 -*-
from __future__ import unicode_literals

from django.db import models
from django.contrib.auth.models import User, Group
from stdnum.ec import ci
from django.core.exceptions import ValidationError

class School(models.Model):	
	name = models.CharField(max_length=20, blank=True, null=True, default='')
	direccion = models.CharField(max_length=20, blank=True, null=True, default='')
	ruc = models.CharField(max_length=20, blank=True, null=True, default='')
	phone = models.CharField(max_length=20, blank=True, null=True, default = '')
	active = models.NullBooleanField(default=True)
	
	class Meta:
		verbose_name = u'Unidad Educativa'
		verbose_name_plural = u'Unidad Educativa'
	
	def __unicode__(self):
		return u"%s"%self.name
	
	def __str__(self):
		return self.name

class Curso(models.Model):
	name = models.CharField(max_length=50, blank=True, null=True, default='')
	periodo = models.CharField(max_length=25, blank=True, null=True, default='')
	active = models.NullBooleanField(default=True)
	date_added = models.DateField(auto_now_add=True)
	
	class Meta:
		verbose_name = u'Curso'
		verbose_name_plural = u'Curso'
	
	def __unicode__(self):
		return u"%s"%self.name
	
	def __str__(self):
		return self.name

def validate_ci(value):
		if not ci.is_valid(value):
			raise ValidationError("Cedula invalida")

class Perfil(models.Model):	
	user = models.OneToOneField(User, on_delete=models.CASCADE)
	es_alumno = models.NullBooleanField(default=False)
	phone = models.CharField(max_length=10, blank=True, null=True, default='')
	cedula = models.CharField(max_length=10, blank=True, null=False, default='', validators=[validate_ci]) 
	representante = models.CharField(max_length=20, blank=False, null=False, default='')
	curso = models.ForeignKey(Curso, on_delete=models.CASCADE, blank=False, null=False, default=1)
	school = models.ForeignKey(School, on_delete=models.CASCADE, blank=False, null=False, default=1)
	fecha_nacimiento = models.DateField(null=True,blank=True,default=None)
	
	class Meta:
		verbose_name = u'Perfil de Usuario'
		verbose_name_plural = u'Perfil de Usuario'

	
