# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class Document(models.Model):
    _name = 'accounting.document'
    _description = 'Accounting Document Model'
    name = fields.Char()
    description = fields.Char()
    document_number = fields.Char('Document Code')
    document_content = fields.Char('Content')
    document_type_id = fields.Many2one('accounting.document.type')
    document_comment = fields.Char('Comment')
    entry_date = fields.Date()
class DocumentType(models.Model):
    _name = 'accounting.document.type'
    _description = 'Accounting Document Type Model'
    name = fields.Char('Type Name')
    description = fields.Char()
    