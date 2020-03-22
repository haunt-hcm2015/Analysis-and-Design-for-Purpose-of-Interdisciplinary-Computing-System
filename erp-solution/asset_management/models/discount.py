# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class Discount(models.Model):
    _name = 'asset.discount'
    _description = 'Discount Model'
    customer_id = fields.Many2one('asset.customer', string='Customer')
    partner_id = fields.Many2one('res.partner', string='Reseller')
    product_id = fields.Many2one('product.product', string="Product Variant")
    discount_amount = fields.Float('Commission Amount')
  