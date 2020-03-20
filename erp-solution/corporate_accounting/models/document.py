# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class Document(models.Model):
    _name = 'accounting.document'
    _description = 'Accounting Document Model'
    document_type_id = fields.Many2one('accounting.document.type')
class DocumentType(models.Model):
    _name = 'accounting.document.type'
    _description = 'Accounting Document Type Model'
    type_name = fields.Char('Type Name')
    