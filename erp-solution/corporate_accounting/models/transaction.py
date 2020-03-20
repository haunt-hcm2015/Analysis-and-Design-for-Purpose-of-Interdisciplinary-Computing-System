# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class Transaction(models.Model):
    _name = 'accounting.transaction'
    _description = 'Accounting Transaction Model'