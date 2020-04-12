# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class Surgery(models.Model):
    _name = 'medical.surgery'
    _description = 'Medical Surgery Data Models'
    name = fields.Char('Surgery Name')
    description = fields.Char()
