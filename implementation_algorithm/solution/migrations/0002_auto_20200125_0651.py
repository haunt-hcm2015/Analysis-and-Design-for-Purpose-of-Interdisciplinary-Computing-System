# Generated by Django 3.0.2 on 2020-01-24 23:51

from django.db import migrations, models


class Migration(migrations.Migration):

    dependencies = [
        ('solution', '0001_initial'),
    ]

    operations = [
        migrations.AlterField(
            model_name='fields',
            name='field_name',
            field=models.CharField(max_length=150),
        ),
    ]
