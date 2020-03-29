from django.contrib import admin
from .models import Incidence, globalCovid19Live, worldBiospheres, CityWeather
from leaflet.admin import LeafletGeoAdmin
class IncidencesAdmin(LeafletGeoAdmin):
    list_display  = ['name', 'location', 'description', 'created', 'updated']
    list_filter   = ['name']
class LiveCovidDataAdmin(LeafletGeoAdmin):
    list_display  = ['country_re', 'objectid', 'geom', 'lat', 'long_field', 'confirmed', 'deaths']
    list_filter   = ['country_re']
class WorldBiosphereAdmin(LeafletGeoAdmin):
    list_display  = ['countries', 'biosphere', 'review', 'lat_dms', 'long_dms', 'region', 'geom']
    list_filter   = ['countries']
admin.site.register(Incidence, IncidencesAdmin)
admin.site.register(globalCovid19Live, LiveCovidDataAdmin)
admin.site.register(worldBiospheres, WorldBiosphereAdmin)
admin.site.register(CityWeather)
