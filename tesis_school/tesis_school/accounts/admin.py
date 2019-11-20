# -*- coding: utf-8 -*-
from __future__ import unicode_literals

from django.contrib import admin
from django.contrib.auth.admin import UserAdmin
from django.contrib.auth.models import User, Group
from tesis_school.accounts.models import *

# Register your models here.

class PerfilInline(admin.StackedInline):
	model = Perfil
	verbose_name_plural = u'Roles de Usuarios'
	
class CustomUserAdmin(UserAdmin):
	list_display = UserAdmin.list_display
	inlines = (PerfilInline,)

class adminCurso(admin.ModelAdmin):
	list_display = ('id','name','periodo','date_added', 'active')
	search_fields = ('name','active')
	list_filter = ('active','periodo',)

class adminSchool(admin.ModelAdmin):
	list_display = ('id','name','direccion','ruc','phone','active')
	search_fields = ('name','ruc','active')
	list_filter = ('active','ruc',)

admin.site.unregister(User)
admin.site.register(User,CustomUserAdmin)
admin.site.register(Curso,adminCurso)
admin.site.register(School,adminSchool)
