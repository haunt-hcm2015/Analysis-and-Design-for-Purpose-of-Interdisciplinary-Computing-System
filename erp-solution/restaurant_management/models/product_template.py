# -*- coding: utf-8 -*-
from odoo import models, api, fields, tools, _
class ProductTemplate(models.Model):
    _inherit = "product.template"
    is_food = fields.Boolean(string='Food')
    is_beverage = fields.Boolean(string='Beverage')
    
    

