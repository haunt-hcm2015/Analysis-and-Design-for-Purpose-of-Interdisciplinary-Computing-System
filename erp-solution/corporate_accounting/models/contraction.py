# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class Contraction(models.Model):
    _name = 'accounting.contraction'
    _description = 'Accounting Contraction Model'
    contraction_type_id = fields.Many2one(comodel='accounting.contraction.type', string='Type Name')
class ContractionType(models.Model):
    _name = 'accounting.contraction.type'
    _description = 'Accounting Contraction Type Model'
    _rec_name = 'type_name'
    type_name = fields.Char('Type Name')