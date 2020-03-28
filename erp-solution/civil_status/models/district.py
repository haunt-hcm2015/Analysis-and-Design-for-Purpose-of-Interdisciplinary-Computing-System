# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class District(models.Model):
    _name = 'civil.status.district'
    _description = 'District model'
    name = fields.Char('District Name')
    population = fields.Integer()
    district_abbr = fields.Char('District Abbreviation')
    country = fields.Many2one('country')
    city = fields.Many2one('city')
   