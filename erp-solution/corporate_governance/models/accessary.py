# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class Accessary(models.Model):
    _name = 'governance.accessary'
    _description = 'Governance Accessary Model'
    product_tmpl_id = fields.Many2one('product.template', string="Product")
    product_id = fields.Many2one('product.product', string="Product Variant")
  