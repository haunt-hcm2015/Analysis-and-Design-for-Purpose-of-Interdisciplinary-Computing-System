# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class Account(models.Model):
    _name = 'accounting.account'
    _description = 'Account Bank Model'
    account_number = fields.Integer()
    account_type_id = fields.Many2one('accounting.account.type',string='Account Type')
    account_status_id = fields.Many2one('accounting.account.status',string='Account Status')
    customer_id = fields.Many2one('accounting.customer', string='Customer')
    balance = fields.Float()
    date_opened = fields.Date()
    date_closed = fields.Date()
class AccountType(models.Model):
    _name = 'accounting.account.type'
    _description = 'Account Bank Type Model'
    _rec_name = 'type_name'
    type_name = fields.Char()
    description = fields.Char()
class AccountStatus(models.Model):
    _name = 'accounting.account.status'
    _description = 'Account Bank Status Model'
    name = fields.Char()
    description = fields.Char()
    
    
    


