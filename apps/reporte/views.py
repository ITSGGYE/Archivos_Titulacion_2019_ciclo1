from django.shortcuts import render 
from django.http import HttpResponse
from apps.mantenimiento.models import Persona,TipoPersonas
from django.views.generic import ListView,CreateView,View
from django.conf import settings
from reportlab.pdfgen import canvas
from io import BytesIO
from reportlab.platypus import Table
from reportlab.platypus import SimpleDocTemplate, Paragraph, TableStyle
from reportlab.lib import colors
from apps.calificacion.models import RespCalificacion
from django.db.models import Count,Sum
from .models import TmpReporteCalificacion
from apps.mantenimiento.models import Persona
from apps.calificacion.models import TipoEvaluacion
from reportlab.graphics.shapes import Drawing, String
from reportlab.graphics import renderPDF
import io
import matplotlib.pyplot as plt
from .backends.backend_agg import FigureCanvasAgg
from random import sample
import numpy as np
# Create your views here.

def ListarDoc(request):
    return render(request,'reportes/listar.html')


class  ReportePersonasPDF(View):
    def cabecera(self,pdf):
        archivo_imagen = settings.MEDIA_ROOT+'/imagenes/logo_2.jpg'
        pdf.drawImage(archivo_imagen,40,750,120,90,preserveAspectRatio=True)
        pdf.setFont("Helvetica", 16)
        pdf.drawString(190,790,"FERNANDO PIZARRO BERMEO")
        pdf.setFont("Helvetica", 16)
        pdf.drawString(220,770, "REPORTE CALIFICACION")

    def get(self, request, *args, **kwargs):
        response = HttpResponse(content_type='application/pdf')
        buffer = BytesIO()
        pdf = canvas.Canvas(buffer)
        self.cabecera(pdf)
        y= 600
        self.tabla(pdf,y)
        pdf.showPage()
        pdf.save()
        pdf = buffer.getvalue()
        buffer.close()
        response.write(pdf)
        return response

    def tabla(self,pdf,y):
        encabezados = ('DOCENTES','EED','A','EDD','EPP','TOTAL')
        cm = 20
       
        queryCalifacion = FormatoCalificacion()
        
        detail = [(queryCalifacion.docente, queryCalifacion.promeEstudiante, queryCalifacion.promeAutoevaluacion, queryCalifacion.promeEDD, queryCalifacion.promeEPP,
        (queryCalifacion.promeEstudiante + queryCalifacion.promeAutoevaluacion + queryCalifacion.promeEDD + queryCalifacion.promeEPP)/4) for queryCalifacion in TmpReporteCalificacion.objects.all()]
        detalle_orden = Table([encabezados]+ detail, colWidths=[5 * cm , 3 *cm , 3 *cm , 5 *cm ])
        print(detail)
        TmpReporteCalificacion.objects.all().delete()
        detalle_orden.setStyle(TableStyle(
        [
                #La primera fila(encabezados) va a estar centrada
                ('ALIGN',(0,0),(3,0),'CENTER'),
                #Los bordes de todas las celdas serán de color negro y con un grosor de 1
                ('GRID', (0, 0), (-1, -1), 1, colors.black),
                #El tamaño de las letras de cada una de las celdas será de 10
                ('FONTSIZE', (0, 0), (-1, -1), 10),
                ]
        ))
        
        detalle_orden.wrapOn(pdf, 800, 600)
        detalle_orden.drawOn(pdf, 60,y)


class  PDFDiffEsAutoevaluacion(View):
    def cabecera(self,pdf):
        archivo_imagen = settings.MEDIA_ROOT+'/imagenes/logo_2.jpg'
        pdf.drawImage(archivo_imagen,40,750,120,90,preserveAspectRatio=True)
        pdf.setFont("Helvetica", 16)
        pdf.drawString(190,790,"FERNANDO PIZARRO BERMEO")
        pdf.setFont("Helvetica", 16)
        pdf.drawString(220,770, "REPORTE CALIFICACION")

    def get(self, request, *args, **kwargs):
        response = HttpResponse(content_type='application/pdf')
        buffer = BytesIO()
        pdf = canvas.Canvas(buffer)
        self.cabecera(pdf)
        y= 600
        self.tabla(pdf,y)
        pdf.showPage()
        pdf.save()
        pdf = buffer.getvalue()
        buffer.close()
        response.write(pdf)
        return response

    def tabla(self,pdf,y):
        encabezados = ('DOCENTES','EED' , 'A','DIFERENCIA')
        cm = 20
       
        queryCalifacion = FormatoCalificacion()
        
        detail = [(queryCalifacion.docente, queryCalifacion.promeEstudiante,  queryCalifacion.promeAutoevaluacion,
        (queryCalifacion.promeEstudiante - queryCalifacion.promeAutoevaluacion)) for queryCalifacion in TmpReporteCalificacion.objects.all()]
        detalle_orden = Table([encabezados]+ detail, colWidths=[5 * cm , 3 *cm , 3 *cm , 5 *cm ])
        
        TmpReporteCalificacion.objects.all().delete()
        detalle_orden.setStyle(TableStyle(
        [
                #La primera fila(encabezados) va a estar centrada
                ('ALIGN',(0,0),(3,0),'CENTER'),
                #Los bordes de todas las celdas serán de color negro y con un grosor de 1
                ('GRID', (0, 0), (-1, -1), 1, colors.black),
                #El tamaño de las letras de cada una de las celdas será de 10
                ('FONTSIZE', (0, 0), (-1, -1), 10),
                ]
        ))
        
        detalle_orden.wrapOn(pdf, 800, 600)
        detalle_orden.drawOn(pdf, 60,y)


class  PDFDiffEDDEPP(View):
    def cabecera(self,pdf):
        archivo_imagen = settings.MEDIA_ROOT+'/imagenes/logo_2.jpg'
        pdf.drawImage(archivo_imagen,40,750,120,90,preserveAspectRatio=True)
        pdf.setFont("Helvetica", 16)
        pdf.drawString(190,790,"FERNANDO PIZARRO BERMEO")
        pdf.setFont("Helvetica", 16)
        pdf.drawString(220,770, "REPORTE CALIFICACION")

    def get(self, request, *args, **kwargs):
        response = HttpResponse(content_type='application/pdf')
        buffer = BytesIO()
        pdf = canvas.Canvas(buffer)
        self.cabecera(pdf)
        y= 600
        self.tabla(pdf,y)
        pdf.showPage()
        pdf.save()
        pdf = buffer.getvalue()
        buffer.close()
        response.write(pdf)
        return response

    def tabla(self,pdf,y):
        encabezados = ('DOCENTES','EDD' , 'EPP','DIFERENCIA')
        cm = 20
       
        queryCalifacion = FormatoCalificacion()
        
        detail = [(queryCalifacion.docente, queryCalifacion.promeEDD,  queryCalifacion.promeEPP,
        (queryCalifacion.promeEDD - queryCalifacion.promeEPP)) for queryCalifacion in TmpReporteCalificacion.objects.all()]
        detalle_orden = Table([encabezados]+ detail, colWidths=[5 * cm , 3 *cm , 3 *cm , 5 *cm ])
        
        TmpReporteCalificacion.objects.all().delete()
        detalle_orden.setStyle(TableStyle(
        [
                #La primera fila(encabezados) va a estar centrada
                ('ALIGN',(0,0),(3,0),'CENTER'),
                #Los bordes de todas las celdas serán de color negro y con un grosor de 1
                ('GRID', (0, 0), (-1, -1), 1, colors.black),
                #El tamaño de las letras de cada una de las celdas será de 10
                ('FONTSIZE', (0, 0), (-1, -1), 10),
                ]
        ))
        
        detalle_orden.wrapOn(pdf, 800, 600)
        detalle_orden.drawOn(pdf, 60,y)


class  PdfPromedio(View):
    def cabecera(self,pdf):
        archivo_imagen = settings.MEDIA_ROOT+'/imagenes/logo_2.jpg'
        pdf.drawImage(archivo_imagen,40,750,120,90,preserveAspectRatio=True)
        pdf.setFont("Helvetica", 16)
        pdf.drawString(190,790,"FERNANDO PIZARRO BERMEO")
        pdf.setFont("Helvetica", 16)
        pdf.drawString(220,770, "REPORTE CALIFICACION")

    def get(self, request, *args, **kwargs):
        response = HttpResponse(content_type='application/pdf')
        buffer = BytesIO()
        pdf = canvas.Canvas(buffer)
        self.cabecera(pdf)
        y= 600
        self.tabla(pdf,y)
        pdf.showPage()
        pdf.save()
        pdf = buffer.getvalue()
        buffer.close()
        response.write(pdf)
        return response

    def tabla(self,pdf,y):
        encabezados = ('Descripcion','Docentes' , '%')
        cm = 20
       
        queryCalifacion = FormatoCalificacion()
        sobrePromedio = 0
        debajoPromedio = 0
        total = 0 
        for data in queryCalifacion:
            promedio = (data.promeEstudiante + data.promeAutoevaluacion + data.promeEDD + data.promeEPP) /4
            if promedio >= 94.90:
                sobrePromedio = sobrePromedio + 1
            else:
                debajoPromedio = debajoPromedio + 1

            total = total +1 

        superior = 100.0 * sobrePromedio / total
        inferior = 100.0 * debajoPromedio / total
        

        detail= [('Sobre el promedio',sobrePromedio,superior),('Bajo el promedio',debajoPromedio,inferior),
        ('Total',total,100)]
        detalle_orden = Table([encabezados]+ detail, colWidths=[5 * cm , 3 *cm ])
        
        TmpReporteCalificacion.objects.all().delete()
        detalle_orden.setStyle(TableStyle(
        [
                #La primera fila(encabezados) va a estar centrada
                ('ALIGN',(0,0),(2,0),'CENTER'),
                #Los bordes de todas las celdas serán de color negro y con un grosor de 1
                ('GRID', (0, 0), (-1, -1), 1, colors.black),
                #El tamaño de las letras de cada una de las celdas será de 10
                ('FONTSIZE', (0, 0), (-1, -1), 10),
               ]
        ))
        
        detalle_orden.wrapOn(pdf, 800, 600)
        detalle_orden.drawOn(pdf, 60,y)





def Principal(request,id):
    if id is 2:
        return graficos3(request)
    elif id is 1:
        return graficos4(request)
    elif id is 3:
        return graficos2(request)


def reportes(request,id):
    return render(request,'reportes/ejemplos.html',{'id':id})
def plot(request):

    x = range(1,11)
    y = sample(range(20), len(x))

    f = plt.figure()

    axes = f.add_axes([0.15, 0.15, 0.75, 0.75]) # [left, bottom, width, height]
    axes.plot(x, y)
    axes.set_xlabel("Eje X")
    axes.set_ylabel("Eje Y")
    axes.set_title("Mi gráfico dinámico")

    buf = io.BytesIO()
    canvas = FigureCanvasAgg(f)
    canvas.print_png(buf)

    response = HttpResponse(buf.getvalue(), content_type='image/png')

    f.clear()

    response['Content-Length'] = str(len(response.content))

    return response


def graficos2(request):
    
    explode = []
    countMayor = 0 
    countMenor= 0 
    countTotal = 0
    tmp = FormatoCalificacion()
    paises = []
    porcentaje = []
    promayor = 0
    promenor = 0
    for t in tmp:
        countTotal = countTotal + 1
        promTmp = t.promeEstudiante
        if promTmp >= 75:
            promayor = promayor + promTmp
            countMayor = countMayor + 1
        else:
            promenor = promenor + promTmp
            countMenor = countMenor + 1
    

    porcentaje.append(promayor / countMayor)
    porcentaje.append(promenor / countMenor)
    explode.append(0)
    explode.append(0)
    TmpReporteCalificacion.objects.all().delete()
    f = plt.figure(figsize=(5,3))
    plt.pie(porcentaje, explode=explode, autopct='%1.1f%%', shadow=True, startangle=90)
    plt.title('LOS PUNTAJES SUPERARON LOS 75 PUNTOS')
    
   # f = plt.figure()
   

    buf = io.BytesIO()
    canvas = FigureCanvasAgg(f)
    canvas.print_png(buf)

    response = HttpResponse(buf.getvalue(), content_type='image/png')

    f.clear()

    response['Content-Length'] = str(len(response.content))

    return response

def graficos3(request):
    explode = []
    tmp = FormatoCalificacion()
    docentes = []
    calificacion = []
    count = 0 
    for t in tmp:
        promTmp = (t.promeEstudiante + t.promeAutoevaluacion +t.promeEDD +t.promeEPP) / 4
        
        docentes.append(t.docente)
        calificacion.append(promTmp)
        count = count + 1

    TmpReporteCalificacion.objects.all().delete()
    f = plt.figure(figsize=(12,6))

    plt.barh(range(count) , calificacion , edgecolor='blue', height=0.6,align='center')
    plt.yticks(range(count),docentes)
    plt.title('EVALUACION TOTAL DE DOCENTES')
    plt.prop = {'size' : 60}
    plt.xlim(0,100)

    buf = io.BytesIO()
    canvas = FigureCanvasAgg(f)
    canvas.print_png(buf)

    response = HttpResponse(buf.getvalue(), content_type='image/png')

    f.clear()

    response['Content-Length'] = str(len(response.content))

    return response


def graficos4(request):
    
    details = FormatoCalificacion()
    eedx = []
    autox = []
    eddx = []
    epp = []
    total = []
    docentes = []
    for datos in details:
        docentes.append(datos.docente)
        eedx.append(datos.promeEstudiante)
        autox.append(datos.promeAutoevaluacion)
        eddx.append(datos.promeEDD)
        epp.append(datos.promeEPP)
        total.append((datos.promeEstudiante+datos.promeAutoevaluacion+datos.promeEDD+datos.promeEPP)/4)
    
    TmpReporteCalificacion.objects.all().delete()
    f = plt.figure(figsize=(14,12))
    X = np.arange(len(docentes))
    plt.bar(X+ 0.00, eedx ,label = 'EED', width= 0.15 , color = 'yellow', edgecolor='yellow')
    plt.bar(X + 0.15 ,autox ,label = 'A', width= 0.15 , color = 'purple',edgecolor='purple')
    plt.bar(X + 0.30 ,eddx ,label = 'EED', width=  0.15 , color = 'green', edgecolor='green')
    plt.bar(X + 0.45 ,epp ,label = 'EPP', width= 0.15 , color = 'red' , edgecolor='red')
    plt.bar(X + 0.60 ,total ,label = 'TOTAL', width= 0.15 , color = 'blue' , edgecolor='blue')
    plt.xticks(X,docentes)
    plt.title('Evaluacion docente por asignacion')
    plt.ylabel('Promedio')
    plt.xlabel('Docentes')
    plt.legend()


    buf = io.BytesIO()
    canvas = FigureCanvasAgg(f)
    canvas.print_png(buf)

    response = HttpResponse(buf.getvalue(), content_type='image/png')

    f.clear()

    response['Content-Length'] = str(len(response.content))

    return response


def ObtenerDocente(idDocente):
    return Persona.objects.filter(id=idDocente).first()

def FormatoCalificacion():
    details = RespCalificacion.objects.values('evaluacion_id','calificado_id').annotate(count=Count('evaluacion_id'),count2=Count('calificado_id'),total_price=Sum('promedio'))
        
    for x  in details:
        evaluarId =  x['evaluacion_id']
        doceneId = x['calificado_id']
        prome =  x['total_price']  / x['count2']
        tmpuser = TmpReporteCalificacion.objects.filter(docente_id=doceneId)

        if tmpuser.exists():
            tmpuser = tmpuser.first()
            if evaluarId is 1:
                tmpuser.promeEstudiante = prome                
            elif evaluarId is 2:
                tmpuser.promeAutoevaluacion = prome  
            elif evaluarId is 3:
                tmpuser.promeEDD = prome 
            else:
                tmpuser.promeEPP = prome 
            tmpuser.save()
        else:               
            if evaluarId is 1:
                p = TmpReporteCalificacion(docente_id=doceneId,promeEstudiante=prome,promeAutoevaluacion=0,promeEDD=0,promeEPP=0)                
            elif evaluarId is 2:
                p = TmpReporteCalificacion(docente_id=doceneId,promeEstudiante=0,promeAutoevaluacion=prome,promeEDD=0,promeEPP=0)   
            elif evaluarId is 3:
                p = TmpReporteCalificacion(docente_id=doceneId,promeEstudiante=0,promeAutoevaluacion=0,promeEDD=prome,promeEPP=0)  
            else:
                p = TmpReporteCalificacion(docente_id=doceneId,promeEstudiante=0,promeAutoevaluacion=0,promeEDD=0,promeEPP=prome) 
            p.save()

    
    return TmpReporteCalificacion.objects.all()