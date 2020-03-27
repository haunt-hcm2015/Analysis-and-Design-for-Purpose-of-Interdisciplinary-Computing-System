# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class Customer(models.Model):
    _name = 'accounting.customer'
    _description = 'Accounting Customer Model'
    customer_number = fields.Integer('Customer Number')
    last_name = fields.Char('Last Name')
    middle_name = fields.Char('Middle Name')
    first_name = fields.Char('First Name')
    other_name = fields.Char('Other Name')
    phone_number = fields.Char('Phone Number')
    customer_address_1_ids = fields.One2many('accounting.customer.address', 'customer_id', string='Address Line 1')
    customer_address_2_ids = fields.One2many('accounting.customer.address', 'customer_id', string='Address Line 2')
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
    customer_type_id = fields.Many2one('accounting.customer.type')
class CustomerType(models.Model):
    _name = 'accounting.customer.type'
    _description = 'Accounting Customer Type Model'
    name = fields.Char('Type Name')
class CustomerAddress(models.Model):
    _name = 'accounting.customer.address'
    _description = 'Accounting Customer Type Model'
    address_id = fields.Many2one('civil.status.address', string='Address')
    customer_id = fields.Many2one('accounting.customer',string='Customer')