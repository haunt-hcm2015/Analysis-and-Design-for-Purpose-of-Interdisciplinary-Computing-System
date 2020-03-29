from __future__ import unicode_literals
from django.db import models
from django.db.models import Manager as GeoManager
from django.contrib.gis.db import models

class Incidence(models.Model):
    name = models.CharField(max_length=20)
    location = models.PointField(srid=4326)
    description = models.TextField()
    image = models.ImageField(null=True)
    created = models.DateTimeField(auto_now_add=True)
    updated = models.DateTimeField(auto_now=True) 
    objects = GeoManager()
    def image_tag(self):
        return mark_safe('<img src="/media/%s" width="349px" />' % (self.image))
    image_tag.short_description = 'Display Image'

    def __unicode__(self):
        return self.name 
class globalCovid19Live(models.Model):
    fid = models.IntegerField()
    objectid = models.FloatField()
    country_re = models.CharField(max_length=254)
    last_updat = models.FloatField()
    lat = models.FloatField()
    long_field = models.FloatField()
    confirmed = models.FloatField()
    deaths = models.FloatField()
    recovered = models.FloatField()
    geom = models.MultiPointField(srid=4326)
    def __unicode__(self):
        return self.country_re
class worldBiospheres(models.Model):
    id = models.FloatField(primary_key=True)
    fid = models.IntegerField()
    countries = models.CharField(max_length=254)
    biosphere = models.CharField(max_length=254)
    designatio = models.CharField(max_length=254)
    review = models.CharField(max_length=254)
    lat_dms = models.CharField(max_length=254)
    long_dms = models.CharField(max_length=254)
    region = models.CharField(max_length=254)
    geom = models.MultiPointField(srid=4326)
    def __unicode__(self):
        return self.countries

