# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class ShoppingVotes(models.Model):
    _name = 'asset.shopping.votes'
    _description = 'Shopping Votes Model'
    votes_number = fields.Char('Shopping Votes Number')
    product_tmpl_id = fields.Many2one('product.template', string="Product")
    product_id = fields.Many2one('product.product', string="Product Variant")
    description = fields.Char('Tool Description')

  