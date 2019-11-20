# -*- coding: utf-8 -*-
from __future__ import unicode_literals

from django.contrib import admin
from django.contrib.auth.models import Group
from openpyxl.workbook import Workbook
from django.http import HttpResponse
from tesis_school.core.models import *

# Register your models here.

class adminPaymentDetails(admin.ModelAdmin):
    list_display = ('id','user','payment_type','value' ,'active',)
    list_display_links = ('active','user',)

admin.site.register(PaymentDetails, adminPaymentDetails)