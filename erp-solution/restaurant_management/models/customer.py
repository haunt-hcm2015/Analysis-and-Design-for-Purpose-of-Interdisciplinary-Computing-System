# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class Customer(models.Model):
    _name = 'restaurant.customer'
    _description = 'Customer Model'
    customer_type_id = fields.Many2one('restaurant.customer.type')
    
class CustomerType(models.Model):
    _name = 'restaurant.customer.type'
    _description = 'Customer Type Model'
    _rec_name = 'type_name'
    type_name = fields.Char()
