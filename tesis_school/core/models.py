# -*- coding: utf-8 -*-
from __future__ import unicode_literals

from decimal import Decimal
from django.db import models
from django.contrib.auth.models import User, Group

# Create your models here.

class PaymentDetails(models.Model):
	EFECTIVO = 'EF'
	CHEQUE = 'CH'
	TARJETA = 'TA'

	PAYMENT_TYPE = (
		(EFECTIVO,u'Efectivo'),
		(CHEQUE,u'Cheque'),
		(TARJETA,u'Tarjeta Credito/Debito'),
	)

	user = models.ForeignKey(User, on_delete=models.CASCADE)
	payment_type = models.CharField(max_length=3,choices=PAYMENT_TYPE,default=EFECTIVO)
	value = models.DecimalField(max_digits=20,decimal_places=2,default=Decimal('0.00'))
	active = models.NullBooleanField(default=True)
	date_added = models.DateField(auto_now_add=True)
	
	class Meta:
		verbose_name = u'Pago de Pensiones'
		verbose_name_plural = u'Pago de Pensiones'

	def __unicode__(self):
		return u"%s"%self.user.username
