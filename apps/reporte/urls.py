from django.urls import path
from .views import ListarDoc,ReportePersonasPDF,plot,reportes,graficos2,graficos3,graficos4,Principal,PDFDiffEsAutoevaluacion \
    , PDFDiffEDDEPP, PdfPromedio


url_reportes = [
    path('listar/',ListarDoc,name='listarDoc'),
    path('reporte_calificacion/',ReportePersonasPDF.as_view(), name='reporte_persona_pdf'),
    path('reporte_calificacion_diferencia/', PDFDiffEsAutoevaluacion.as_view(), name='reporte_diferencia_pdf'),
    path('reporte_calificacion_diferencia_academico/', PDFDiffEDDEPP.as_view(), name='reporte_diferencia_academica_pdf'),
    path('reporte_calificacion_promedio/', PdfPromedio.as_view(), name='reporte_promedio_pdf'),
    path('reportes/<int:id>/',reportes,name='reposteria'),
    path('plot/<int:id>/', Principal),
]