# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class CustomerCard(models.Model):
    _name = 'customer.card'
    _description = 'Customer Card Model'
    menu_type_id = fields.Many2one('customer.card.type')
    
class CustomerCardType(models.Model):
    _name = 'customer.card.type'
    _description = 'Customer Card Type Model'
