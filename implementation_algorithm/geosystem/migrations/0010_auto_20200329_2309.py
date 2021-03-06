# Generated by Django 3.0.2 on 2020-03-29 16:09

import django.contrib.gis.db.models.fields
from django.db import migrations, models


class Migration(migrations.Migration):

    dependencies = [
        ('geosystem', '0009_auto_20200329_2306'),
    ]

    operations = [
        migrations.CreateModel(
            name='worldBiospheres',
            fields=[
                ('id', models.FloatField(primary_key=True, serialize=False)),
                ('fid', models.IntegerField()),
                ('countries', models.CharField(max_length=254)),
                ('biosphere', models.CharField(max_length=254)),
                ('designatio', models.CharField(max_length=254)),
                ('review', models.CharField(max_length=254)),
                ('lat_dms', models.CharField(max_length=254)),
                ('long_dms', models.CharField(max_length=254)),
                ('region', models.CharField(max_length=254)),
                ('geom', django.contrib.gis.db.models.fields.MultiPointField(srid=4326)),
            ],
        ),
        migrations.DeleteModel(
            name='worldBiospheresShp',
        ),
    ]
