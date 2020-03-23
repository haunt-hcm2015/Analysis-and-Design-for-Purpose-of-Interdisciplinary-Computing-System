# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class Document(models.Model):
    _name = 'school.document'
    _description = 'Document Model store info: '
    document_name = fields.Char()
    document_type_id = fields.Many2one('school.document.type')

class DocumentType(models.Model):
    _name = 'school.document.type'
    _description = 'Document Type Model'
    _rec_name = 'type_name'
    type_name = fields.Char()