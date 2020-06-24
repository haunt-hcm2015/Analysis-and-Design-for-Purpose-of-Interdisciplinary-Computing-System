import os
from django.contrib.gis.utils import LayerMapping
from .models import globalCovid19Live, worldBiospheres
globalCovid19LiveShpMapping = {
    'fid': 'fid',
    'objectid': 'OBJECTID',
    'country_re': 'Country_Re',
    'last_updat': 'Last_Updat',
    'lat': 'Lat',
    'long_field': 'Long_',
    'confirmed': 'Confirmed',
    'deaths': 'Deaths',
    'recovered': 'Recovered',
    'geom': 'MULTIPOINT',
}
worldBiospheresShpMapping = {
    'fid': 'fid',
    'id': 'ID',
    'countries': 'Countries',
    'biosphere': 'Biosphere',
    'designatio': 'Designatio',
    'review': 'Review',
    'lat_dms': 'lat_dms',
    'long_dms': 'long_dms',
    'region': 'Region',
    'geom': 'MULTIPOINT',
}
global_covid19_live_package = os.path.abspath(os.path.join(os.path.dirname(__file__), 'covid-19-global-live-data/global_covid19_live_update.shp')) 
worldBiospheresData = os.path.abspath(os.path.join(os.path.dirname(__file__), 'biosphere_world/world_biospheres.shp')) 

def run(verbose=True):
    layerMapping1 = LayerMapping(globalCovid19Live, global_covid19_live_package, globalCovid19LiveShpMapping, unique=('fid'),transform=False, encoding='iso-8859-1')
    layerMapping1.save(strict=True, verbose=verbose)
    layerMapping2 = LayerMapping(worldBiospheres, worldBiospheresData, worldBiospheresShpMapping, unique=('fid'),transform=False, encoding='iso-8859-1')
    layerMapping2.save(strict=True, verbose=verbose)
