# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class DebtReconciliationBook(models.Model):
    _inherit = 'accounting.debt.confirmation.sheet'
    _description = 'Accounting Debt Confirmation Book Model'
    clearning_debt_id = fields.Many2one('accounting.clearning.debt', string='Clearning Debt')
class ClearingDebt(models.Model):
    _name = 'accounting.clearning.debt'
    _description = 'Accounting Clearing Debt Model'
    counter_party_id = fields.Many2one('accounting.transaction.parties', string='Counter Party')
    party_id = fields.Many2one('accounting.transaction.parties', string='Party')
    party_role = fields.Char('Party')
    counnter_party_role = fields.Char('Counter Party')
    receivable = fields.Float()
    payable = fields.Float()
    state = fields.Selection([
        ('receivable', 'Receivable'),
        ('payable', 'Payable')
    ], 'State')
