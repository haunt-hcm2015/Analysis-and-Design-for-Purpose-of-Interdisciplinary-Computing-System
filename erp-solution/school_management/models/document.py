# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class Document(models.Model):
    _name = 'document'
    _description = 'Document Model'
class DocumentType(models.Model):
    _name = 'document.type'
    _description = 'Document Type Model'