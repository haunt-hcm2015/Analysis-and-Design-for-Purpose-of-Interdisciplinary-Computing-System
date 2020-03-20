# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class Receipt(models.Model):
    _name = 'accounting.receipt'
    _description = 'Accounting Receipt Model'