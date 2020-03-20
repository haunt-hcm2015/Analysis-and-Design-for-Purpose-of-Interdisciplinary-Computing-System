# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class Ledger(models.Model):
    _name = 'accounting.ledger'
    _description = 'Accounting Ledger Model'