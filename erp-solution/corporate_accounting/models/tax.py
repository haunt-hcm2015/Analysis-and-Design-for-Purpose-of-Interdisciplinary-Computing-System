# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class Tax(models.Model):
    _name = 'accounting.tax'
    _description = 'Accounting Tax Model'
class TaxRate(models.Model):
    _name = 'accounting.tax.rate'
    _description = 'Accounting Tax Rate Model'
class TaxApplicability(models.Model):
    _name = 'accounting.tax.applicability'
    _description = 'Accounting Tax Applicability Model'
