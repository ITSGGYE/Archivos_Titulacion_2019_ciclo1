from django.conf.urls import url
from tesis_school.accounts.views import *

urlpatterns = [
	#url(r'^$', dashboard, name="dashboard"),
    url(r'^login/$', login, name='login'),
    url(r'^logout/$', logout, name='logout'),    
]