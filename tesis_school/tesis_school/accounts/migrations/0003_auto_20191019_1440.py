# Generated by Django 2.2.5 on 2019-10-19 19:40

from django.db import migrations, models


class Migration(migrations.Migration):

    dependencies = [
        ('accounts', '0002_auto_20191019_1327'),
    ]

    operations = [
        migrations.AlterField(
            model_name='perfil',
            name='cedula',
            field=models.CharField(blank=True, default='', max_length=10, null=True),
        ),
        migrations.AlterField(
            model_name='perfil',
            name='phone',
            field=models.CharField(blank=True, default='', max_length=10, null=True),
        ),
    ]
