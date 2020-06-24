# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class Document(models.Model):
    _inherit = 'accounting.document'
    _description = 'Document Model'
