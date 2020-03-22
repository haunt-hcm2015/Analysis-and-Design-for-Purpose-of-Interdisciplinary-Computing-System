# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class Country(models.Model):
    _name = 'country'
    _description = 'Country Model'
    name = fields.Char('National Name')
    country_abbr = fields.Char('Country Abbreviation')
    country_code = fields.Char('Country Code')

  