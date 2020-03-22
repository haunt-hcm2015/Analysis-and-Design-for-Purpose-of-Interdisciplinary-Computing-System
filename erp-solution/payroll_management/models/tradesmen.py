# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class Tradesmen(models.Model):
    _name = 'payroll.tradesmen'
    _description = 'Tradesmen Model'
    company_name = fields.Char()
    address = fields.Char()
    email = fields.Char()
    phone_number = fields.Char()
    postcode = fields.Integer()
    tradesmen_type_id = fields.Many2one('payroll.tradesmen.type')
class TradesmenType(models.Model):
    _name = 'payroll.tradesmen.type'
    _description = 'Tradesmen Model'
    _rec_name = 'type_name'
    type_name = fields.Char()