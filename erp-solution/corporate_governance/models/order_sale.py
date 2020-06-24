# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class OrderSale(models.Model):
    _name = 'governance.order.sale'
    _description = 'Order Sale Model'
    customer_id = fields.Many2one('accounting.customer', string='Customer')
    status = fields.Selection([
        ('cancelled','Cancelled'),
        ('completed','Completed'),
        ('open','Open')
    ], 'Order Status')
    ordered_date = fields.Date('Date Ordered')