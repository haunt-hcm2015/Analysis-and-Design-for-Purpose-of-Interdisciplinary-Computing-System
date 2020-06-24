from django.shortcuts import render
from technology import config
import requests
from .models import CityWeather as cityw
def gis(request):
    return render(request, 'pages/geographics-information-system.html',{'PHP_HOST': config.PHP_HOST, 'AUTH_LOGIN':config.AUTH_LOGIN,'AUTH_SIGNUP':config.AUTH_SIGNUP})  
def getWeatherData(request):
    url = 'http://api.openweathermap.org/data/2.5/weather?q={}&units=imperial&appid=c55b0c604e5d0dc062635a64ecdc72ee'
    city = 'Ho Chi inh city'
    cities = cityw.objects.all()
    weather_data = []

    for city in cities:
        r = requests.get(url.format(city)).json()
        city_weather = {
            'city': city.name,
            'temperature': r["main"]["temp"],
            'description': r["weather"][0]["description"],
            'icon': r["weather"][0]["icon"],
        }
        weather_data.append(city_weather)

    context = {'weather_data' : weather_data}
    return render(request, 'weather/weather.html', context)
