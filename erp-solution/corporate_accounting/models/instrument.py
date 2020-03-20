# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class Instrument(models.Model):
    _name = 'accounting.instrument'
    _description = 'Accounting Instrument Model'
class InstrumentType(models.Model):
    _name = 'accounting.instrument.type'
    _description = 'Accounting Instrument Type Model'