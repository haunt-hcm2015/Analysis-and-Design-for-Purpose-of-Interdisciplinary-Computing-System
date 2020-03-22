# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class City(models.Model):
    _name = 'civil.status.city'
    _description = 'City Model'
    city_name = fields.Char()
    population = fields.Integer()
    postal_code = fields.Char()
    city_abbr = fields.Char('City Abbreviation')
    country = fields.Many2one('country')

