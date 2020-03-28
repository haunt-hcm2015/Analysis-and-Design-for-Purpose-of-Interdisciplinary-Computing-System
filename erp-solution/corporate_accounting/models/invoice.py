# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class Invoice(models.Model):
    _name = 'accounting.invoice'
    _description = 'Accounting Invoice Model'
    invoice_id = fields.Many2one('accounting.invoice.type', string='Invoice')
class InvoiceType(models.Model):
    _name = 'accounting.invoice.type'
    _description = 'Accounting Invoice Type Model'
    name = fields.Char('Invoice Type')
    description = fields.Char('Invoice Type')
class InvoiceDetail(models.Model):
    _name = 'accounting.invoice.detail'
    _description = 'Accounting Invoice Detail Model'
    