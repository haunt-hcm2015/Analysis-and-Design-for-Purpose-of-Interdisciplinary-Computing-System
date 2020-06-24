# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class CashBook(models.Model):
    _name = 'accounting.cash.book'
    _description = 'Accounting Cash Book Model'
    description = fields.Char()
    department_id = fields.Many2one('hr.department', string='Department')
    fund_type_id = fields.Many2one('accounting.fund.type', string='Fund Type')
    entry_date = fields.Date()
    document_id = fields.Many2many('accounting.document', string='Document')
    document_entry_date = fields.Date('Entry Date for Document')
    fund_entry = fields.Many2many('accounting.currency', string='Funds Entry')
    fund_out = fields.Many2many('accounting.currency', string='Money out of Funds')
    note = fields.Char()
    issued_by = fields.Many2one('hr.employee')
    chief_accountant = fields.Many2one('hr.employee')
    legal_representative = fields.Many2one('hr.employee')

