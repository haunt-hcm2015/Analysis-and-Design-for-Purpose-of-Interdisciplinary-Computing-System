# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class Loan(models.Model):
    _name = 'accounting.loan'
    _description = 'Accounting Loan Model'
class Guarantor(models.Model):
    _name = 'accounting.guarantor'
    _description = 'Accounting Guarantor Model'
class LoanStatus(models.Model):
    _name = 'accounting.loan.status'
    _description = 'Accounting Loan Status Model'
class LoanStandard(models.Model):
    _name = 'accounting.standard.loan'
    _description = 'Accounting Standard Loan Model'