# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class Fund(models.Model):
    _name = 'accounting.fund'
    _description = 'Accounting Fund Model'
    name = fields.Char('Fund Name')
    fund_type_id = fields.Many2one('accounting.fund.type',string='Fund Type')
class FundType(models.Model):
    _name = 'accounting.fund.type'
    _description = 'Accounting Fund Model'
    name = fields.Char('Fund Type')
    description = fields.Char()