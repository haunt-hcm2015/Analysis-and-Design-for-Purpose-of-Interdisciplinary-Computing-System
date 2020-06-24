# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class StateProvince(models.Model):
    _name = 'civil.status.state.province'
    _description = 'State Province Model'
    state_province_name = fields.Char()
    population = fields.Integer()
    state_province_abbr = fields.Char('State Province Abbreviation')
    country = fields.Many2one('country')

