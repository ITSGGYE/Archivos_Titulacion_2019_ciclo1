# Generated by Django 2.2.5 on 2019-10-24 21:17

from django.db import migrations, models


class Migration(migrations.Migration):

    dependencies = [
        ('asignacion', '0002_auto_20191024_1617'),
    ]

    operations = [
        migrations.CreateModel(
            name='Prueba',
            fields=[
                ('id', models.AutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('nombre', models.TextField()),
            ],
        ),
    ]
