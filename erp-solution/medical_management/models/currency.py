# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class Currency(models.Model):
    _name = 'medical.currency'
    _description = 'Curency Model'
    name = fields.Char('Currency Name')
    abbreviation_sign = fields.Char('Abbreviation Sign')
    currency_code = fields.Char('Currency Code')
    currency_type_id = fields.Many2one(comodel_name='currency.type', string = 'Currency Type')
class CurrencyType(models.Model):
    _name = 'medical.currency.type'
    _description = 'Curency Type Model'
    _rec_name = 'type_name'
    type_name = fields.Char('Type Name')
