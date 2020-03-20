# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class Invoice(models.Model):
    _name = 'accounting.invoice'
    _description = 'Accounting Invoice Model'