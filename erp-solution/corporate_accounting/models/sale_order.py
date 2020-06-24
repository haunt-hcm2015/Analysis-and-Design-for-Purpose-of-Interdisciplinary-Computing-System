# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class SaleOrder(models.Model):
    _name = 'accounting.sale.order'
    _description = 'Accounting Sale Order Model'
    sale_order_number = fields.Integer()
    sale_order_detail_ids = fields.One2many('accounting.sale.order.detail', 'sale_order_id', string='Sale Order Product')
    customer_id = fields.Many2one('accounting.customer', string='Customer')
    state = fields.Selection([
        ('draft', 'Draft'),
        ('sent', 'Sent'),
        ('partial','Partial'),
        ('paid','Paid'),
        ('overdue','Overdue'),
        ('canceled','Canceled')
    ], 'State')
class SaleOrderDetail(models.Model):
    _name = 'accounting.sale.order.detail'
    _description = 'Accounting Sale Order Detail Model'
    product_id = fields.Many2one('product.product', string="Product Variant")
    sale_order_id = fields.Many2one('accounting.sale.order', string='Sale Order')
    cost = fields.Float()
    price = fields.Float()
    count = fields.Integer('Purchase Order Count')
    _sql_constraints = [('product_sale_order_unique','unique(product_id, sale_order_id)','Unique between product sale order rows')]
