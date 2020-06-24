# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class Commission(models.Model):
    _name = 'asset.commission'
    _description = 'Commission Model'
    customer_id = fields.Many2one('asset.customer', string='Customer')
    reseller_id = fields.Many2one('res.partner', string='Reseller')
    product_id = fields.Many2one('product.product', string="Product Variant")
    commission_amount = fields.Float('Commission Amount')

  