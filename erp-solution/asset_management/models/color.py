# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class Color(models.Model):
    _name = 'color'
    _description = 'Color Model'
    name = fields.Char('Color Name')
    color_abbr = fields.Char('Color Abbreviation')
    color_code = fields.Char('Color Code')

  