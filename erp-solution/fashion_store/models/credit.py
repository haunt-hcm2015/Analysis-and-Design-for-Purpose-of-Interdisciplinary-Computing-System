# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class Credit(models.Model):
    _name = 'store.credit'
    _description = 'Credit Model'
    menu_type_id = fields.Many2one('credit.type')
    
class CreditType(models.Model):
    _name = 'store.credit.type'
    _description = 'Credit Type Model'
