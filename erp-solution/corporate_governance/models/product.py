# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class Product(models.Model):
    _inherit = 'product.product'
    _description = 'Product Model'
