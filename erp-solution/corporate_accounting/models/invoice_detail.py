# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class InvoiceDetail(models.Model):
    _name = 'accounting.invoice.detail'
    _description = 'Accounting Invoice Detail Model'