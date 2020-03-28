# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class DebtDetailBook(models.Model):
    _name = 'accounting.debt.detail.book'
    _description = 'Accounting Debt Detail Book Model'
    description = fields.Char()
    debt_book_number = fields.Char('Debt Book Number')
    debt_book_type_id = fields.Many2one('accounting.debt.detail.book.type', string='Debt Detail Book Type')
    document_ids = fields.Many2many('accounting.document', string='Document')
    document_entry_date = fields.Date('Entry Date for Document')
    invoice_ids = fields.Many2many('accounting.invoice', string='Invoice')
    accounting_id = fields.Many2many('accounting', string='Contra Account')
    debit = fields.Float()
    credited = fields.Float()
    balance_debit = fields.Float()
    balance_credited = fields.Float()
    issued_by = fields.Many2one('hr.employee')
    chief_accountant = fields.Many2one('hr.employee')
    legal_representative = fields.Many2one('hr.employee')
class DebtDetailBookType(models.Model):
    _name = 'accounting.debt.detail.book.type'
    _description = 'Accounting Debt Detail Book Model'
    name = fields.Char('Debt Book Type')
    description = fields.Char('Debt Book Type')
    