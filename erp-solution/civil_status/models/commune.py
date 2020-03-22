# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class Commune(models.Model):
    _name = 'civil.status.commune'
    _description = 'Commune model'
    commune_name = fields.Char()
    population = fields.Integer()
    commune_abbr = fields.Char('Commune Abbreviation')
    country = fields.Many2one('country')
    city = fields.Many2one('city')