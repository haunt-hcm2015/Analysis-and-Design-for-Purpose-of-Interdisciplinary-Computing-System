# Generated by Django 3.0.2 on 2020-01-25 00:07

from django.db import migrations, models


class Migration(migrations.Migration):

    dependencies = [
        ('solution', '0003_auto_20200125_0705'),
    ]

    operations = [
        migrations.RemoveField(
            model_name='field',
            name='image_link',
        ),
        migrations.AddField(
            model_name='field',
            name='image',
            field=models.ImageField(null=True, upload_to=''),
        ),
    ]