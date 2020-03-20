# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class Customer(models.Model):
    _name = 'accounting.customer'
    _description = 'Accounting Customer Model'
    customer_type_id = fields.Many2one('accounting.customer.type')
class CustomerType(models.Model):
    _name = 'accounting.customer.type'
    _description = 'Accounting Customer Type Model'
    _rec_name = 'type_name'
    type_name = fields.Char('Type Name')