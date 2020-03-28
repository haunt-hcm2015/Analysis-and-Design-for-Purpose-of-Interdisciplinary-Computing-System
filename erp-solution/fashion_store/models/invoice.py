# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class Invoice(models.Model):
    _name = 'store.invoice'
    _description = 'Invoice model'
class InvoiceDetail(models.Model):
    _name = 'store.invoice.detail'
    _description = 'Invoice Detail Model'