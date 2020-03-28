# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class Voucher(models.Model):
    _name = 'accounting.voucher'
    _description = 'Accounting Voucher Model'
    coupon_number = fields.Integer()
    description = fields.Char()
    voucher_type_id = fields.Many2one('accounting.voucher.type',string='Voucher Type')
class VoucherType(models.Model):
    _name = 'accounting.voucher.type'
    _description = 'Accounting Voucher Type Model'
    name = fields.Char()
    description = fields.Char()
    