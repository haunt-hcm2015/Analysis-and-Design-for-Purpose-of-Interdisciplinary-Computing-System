# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class Customer(models.Model):
    _name = 'asset.customer'
    _description = 'Customer Model'
    customer_number = fields.Integer('Customer Number')
    last_name = fields.Char('Last Name')
    middle_name = fields.Char('Middle Name')
    first_name = fields.Char('First Name')
    other_name = fields.Char('Other Name')
    phone_number = fields.Char('Phone Number')
    addressLine1 = fields.Char('Address Line 1')
    addressLine2 = fields.Char('Address Line 2')
    city = fields.Many2one('city')
    country = fields.Many2one('country')
    state = fields.Selection([
        ('new', 'New Customer'),
        ('vip', 'VIP Customer'),
        ('trial', 'Only View'),
        ('member', 'Member'),
        ('expired', 'Expired')
    ], string='State')
    postal_code = fields.Char('Postal Code')
    credit_limit = fields.Date('Credit Limit')

  