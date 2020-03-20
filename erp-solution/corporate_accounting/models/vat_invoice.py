# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class VatInvoice(models.Model):
    _name = 'accounting.vat.invoice'
    _description = 'Accounting VAT Invoice Model'