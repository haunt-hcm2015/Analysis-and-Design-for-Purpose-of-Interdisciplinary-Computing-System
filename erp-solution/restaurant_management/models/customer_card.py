# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class CustomerCard(models.Model):
    _name = 'restaurant.customer.card'
    _description = 'Customer Card Model'
    customer_card_type_id = fields.Many2one('restaurant.customer.card.type')
    
class CustomerCardType(models.Model):
    _name = 'restaurant.customer.card.type'
    _description = 'Customer Card Type Model'
    _rec_name = 'type_name'
    type_name = fields.Char()
