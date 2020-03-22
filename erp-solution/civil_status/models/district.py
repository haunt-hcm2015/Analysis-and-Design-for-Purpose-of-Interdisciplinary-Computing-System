# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class District(models.Model):
    _name = 'civil.status.district'
    _description = 'District model'
    district_name = fields.Char()
    population = fields.Integer()
    district_abbr = fields.Char('District Abbreviation')
    country = fields.Many2one('country')
    city = fields.Many2one('city')
   