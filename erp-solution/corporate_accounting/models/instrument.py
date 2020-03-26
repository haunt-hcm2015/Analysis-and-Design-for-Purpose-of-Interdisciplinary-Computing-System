# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class Instrument(models.Model):
    _name = 'accounting.instrument'
    _description = 'Accounting Instrument Model'
    instrument_id = fields.Many2one('accounting.instrument.type', string='Instrument')
class InstrumentType(models.Model):
    _name = 'accounting.instrument.type'
    _description = 'Accounting Instrument Type Model'
    _rec_name = 'type_name'
    type_name = fields.Char()