from django.conf.urls import url
from tesis_school.core.views import *
from tesis_school.accounts.views import *

urlpatterns = [
	url(r'^$', index, name='index'),
	url(r'^report/$', generate_xlsx_report, name='generate_xlsx_report'),
]
