# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class BankBook(models.Model):
    _name = 'accounting.bank.book'
    _description = 'Accounting Bank Book Model'
    book_number = fields.Char('Bank Book Number')
    bank_id = fields.Many2one('accounting.bank.branches', string='Bank')
    document_id = fields.Many2many('accounting.document',string='Document')
    document_entry_date = fields.Date(related='document_id.entry_date', string='Entry Date')
    accounting_id = fields.Many2many('accounting', string='Contra Account')
    deposit = fields.Float()
    withdraw = fields.Float()
    description = fields.Char()
    entry_date = fields.Date()
    open_bank_book_day = fields.Date()
    note = fields.Char()

