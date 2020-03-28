# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class DebtConfirmationSheet(models.Model):
    _name = 'accounting.debt.confirmation.sheet'
    _description = 'Accounting Debt Confirmation Sheet Model'
    confirmation_number = fields.Char('Confirmation Sheet Number')
    description = fields.Char()
    date_created =  fields.Date()
    counter_party_id = fields.Many2one('accounting.transaction.parties', string='Counter Party')
    party_id = fields.Many2one('accounting.transaction.parties', string='Party')
    party_role = fields.Char('Party')
    counnter_party_role = fields.Char('Counter Party')
    confirm_from = fields.Date('Confirm Debt from')
    confirm_to = fields.Date('Confirm Debt to')
    confirmation_description_ids = fields.Many2many('accounting.debt.confirmation.description', string='Debt Confirmation Description')
    confirmation_detail_ids = fields.Many2many('accounting.debt.confirmation.detail', string='Debt Confirmation Detail')
class DebtConfirmationDescription(models.Model):
    _name = 'accounting.debt.confirmation.description'
    _description = 'Accounting Debt Confirmation Description Model'
    number = fields.Integer('Numerical Order')
    explain = fields.Char()
    amount = fields.Float()
class DebtConfirmationDetail(models.Model):
    _name = 'accounting.debt.confirmation.detail'
    _description = 'Accounting Debt Confirmation Detail Model'
    contract_ids = fields.One2many('accounting.contraction',string='Contract')
    invoice_ids = fields.One2many('accounting.invoice',string='Invoice')
    increased_debt = fields.Float()
    payed = fields.Float()
    payed_date = fields.Date()


    