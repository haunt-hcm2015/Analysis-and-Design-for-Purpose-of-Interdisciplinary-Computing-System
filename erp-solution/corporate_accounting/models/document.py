# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class Document(models.Model):
    _name = 'accounting.document'
    _description = 'Accounting Document Model'
    name = fields.Char()
    document_content = fields.Char('Content')
    document_type_id = fields.Many2one('accounting.document.type')
    entry_date = fields.Date()
class DocumentType(models.Model):
    _name = 'accounting.document.type'
    _description = 'Accounting Document Type Model'
    _rec_name = 'type_name'
    type_name = fields.Char('Type Name')
    description = fields.Char()
    