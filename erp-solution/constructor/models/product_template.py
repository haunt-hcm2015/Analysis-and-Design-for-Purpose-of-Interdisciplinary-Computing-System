# -*- coding: utf-8 -*-
from odoo import models, api, fields, tools, _
class ProductTemplate(models.Model):
    _inherit = "product.template"
    is_constructor = fields.Boolean(string='Building Construction')
    is_component = fields.Boolean(string='Component Construction')
    component_type = fields.Selection([
                            ('human', 'Human'),
                            ('material', 'Material'),
                            ('machine', 'Machine')
                        ], string='Component Type:')
    

