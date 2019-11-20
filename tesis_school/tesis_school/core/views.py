# -*- coding: utf-8 -*-
from __future__ import unicode_literals

from django.contrib.auth.decorators import login_required
from django.shortcuts import render, redirect
from django.contrib import messages
from tesis_school.accounts.models import *
from tesis_school.core.models import *
from django.urls import reverse
from django.views.decorators.csrf import csrf_exempt
from django.http import HttpResponse
from django.utils.encoding import smart_str
from django.contrib.auth.models import User, Group
import requests
from django.db.models import Q

# Create your views here.
@login_required(login_url='/accounts/login/')
def index(request):
	users_list = []
	if request.user.is_superuser:
		users_list = User.objects.all()
	else:
		return redirect(reverse('generate_xlsx_report'))
	if request.method == 'POST':
		user_act = request.POST.get('user_act', False)
		saldo = request.POST.get('saldo', False)

		if not user_act:
			messages.error(request, 'Elija un usuario.')
			return render(request,'core/templates/index.html',{'users_list':users_list})
		
		if not saldo or saldo == '0':
			messages.error(request, 'Elija un saldo valido')
			return render(request,'core/templates/index.html',{'users_list':users_list})
		try:
			from decimal import Decimal
			pay_user = PaymentDetails()
			pay_user.user = User.objects.get(id=int(user_act))
			pay_user.value = Decimal(str(saldo))
			pay_user.save()

			messages.success(request, 'Se registro el pago correctamente')
			return render(request,'core/templates/index.html',{'users_list':users_list})
		except Exception as e:
			messages.error(request, 'ERROR: ' + str(e))
			return render(request,'core/templates/index.html',{'users_list':users_list})
	return render(request,'core/templates/index.html',{'users_list':users_list})

@login_required(login_url='/accounts/login/')
def generate_xlsx_report(request):
	try:
		from StringIO import StringIO
	except ImportError:
		from io import StringIO
	from datetime import datetime,timedelta
	import datetime as dtime
	from openpyxl.workbook import Workbook
	import datetime
	
	userslist = []
	
	if request.user.is_superuser:
		userslist = User.objects.all().order_by('username')
	
	if request.method == 'POST':
		fecha_inicio=request.POST.get('start', False)
		fecha_final=request.POST.get('end', False)
		user_act=request.POST.get('user_act', False)
		if request.user.is_superuser:
			if not user_act:
				messages.error(request, 'Como usuario administrador debe seleccionar el cliente de reporte.')
				return render(request, 'core/templates/xlsx_report.html', {'page_title': "Reporte Excel","userlist":userslist})
		if not fecha_inicio or  not fecha_final:
			messages.error(request, 'Por favor seleccionar correctamente el rango de fechas.')
			return render(request, 'core/templates/xlsx_report.html', {'page_title': "Reporte Excel","userlist":userslist})
		else:
			if request.user.is_superuser:
				header = [u'Usuario', u'cedula', u'curso' ,u'Valor', u'Fecha']
			else:
				header = [u'cedula', u'curso', u'Valor', u'Fecha']
			data = []
			
			try:
				desde = dtime.datetime.strptime(fecha_inicio, '%Y-%m-%d').date()
				hasta = dtime.datetime.strptime(fecha_final, '%Y-%m-%d').date()
				desde = dtime.datetime.combine(desde,dtime.datetime.min.time())
				hasta = dtime.datetime.combine(hasta,dtime.datetime.max.time())
				wb = Workbook()
				ws1 = wb.active
				ws1.append(header)

				if request.user.is_superuser:
					users_lists = User.objects.get(id=int(user_act))
				else:
					users_lists = request.user
				if True:
					sqlwb = PaymentDetails.objects.filter(date_added__gte=desde, date_added__lte=hasta, user=users_lists)
					if sqlwb:
						for info in sqlwb:
							if request.user.is_superuser:
								data.append(info.user.first_name)
							data.append(info.user.perfil.cedula)
							data.append(info.user.perfil.curso.name)
							data.append(info.value)
							data.append(info.date_added)
							ws1.append(data)
							data = []
				else:
					messages.error(request, 'Error al obtener informacion.')
					return render(request, 'core/templates/xlsx_report.html', {'page_title': "Reporte Excel","userlist":userslist})
				response = HttpResponse(content_type='application/ms-excel')
				y1, m1, d1 = fecha_inicio.split('-')
				y2, m2, d2 = fecha_final.split('-')
				import datetime
				now = datetime.datetime.now()
				response['Content-Disposition'] = 'attachment; filename=%s' % smart_str('ArchivoPlano-'+y1+d1+m1+'-'+y2+d2+m2+'-'+str(now.strftime('%H'))+str(now.strftime('%M'))+'.xlsx')
				wb.save(response)
				return response
			except Exception as e:
				messages.error(request, 'Error: ' + str(e))
				return render(request, 'core/templates/xlsx_report.html', {'page_title': "Reporte Excel","userlist":userslist})
	return render(request, 'core/templates/xlsx_report.html', {'page_title': "Reporte Excel","userlist":userslist})
