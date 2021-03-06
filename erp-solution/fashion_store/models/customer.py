# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class Customer(models.Model):
    _name = 'store.customer'
    _description = 'Customer Model'
    menu_type_id = fields.Many2one('customer.type')
    
class CustomerType(models.Model):
    _name = 'store.customer.type'
    _description = 'Customer Type Model'
