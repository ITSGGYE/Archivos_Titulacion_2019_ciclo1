# Generated by Django 2.2.5 on 2019-09-24 15:06

from django.db import migrations, models
import django.db.models.deletion


class Migration(migrations.Migration):

    initial = True

    dependencies = [
    ]

    operations = [
        migrations.CreateModel(
            name='Repuesta',
            fields=[
                ('id', models.AutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('descripcion', models.CharField(default='', max_length=100, verbose_name='Pregunta')),
                ('valor', models.FloatField(default=0.25)),
                ('estado', models.BooleanField(default=True)),
            ],
            options={
                'verbose_name': 'Respuesta',
                'verbose_name_plural': 'Respuestas',
                'ordering': ['id'],
            },
        ),
        migrations.CreateModel(
            name='TipoEvaluacion',
            fields=[
                ('id', models.AutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('descripcion', models.CharField(default='', max_length=100, verbose_name='Pregunta')),
            ],
            options={
                'verbose_name': 'Tipo de Evaluacion',
                'verbose_name_plural': 'Tipos de Evaluacion',
                'ordering': ['id'],
            },
        ),
        migrations.CreateModel(
            name='Pregunta',
            fields=[
                ('id', models.AutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('descripcion', models.CharField(default='', max_length=500, verbose_name='Pregunta')),
                ('estado', models.BooleanField(default=True)),
                ('ispregunta', models.BooleanField(default=True)),
                ('tipoEvaluacion', models.ForeignKey(blank=True, null=True, on_delete=django.db.models.deletion.CASCADE, to='calificacion.TipoEvaluacion')),
            ],
            options={
                'verbose_name': 'Pregunta',
                'verbose_name_plural': 'Preguntas',
                'ordering': ['id'],
            },
        ),
    ]
