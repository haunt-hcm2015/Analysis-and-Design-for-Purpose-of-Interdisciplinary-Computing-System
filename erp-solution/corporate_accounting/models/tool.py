# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class Tool(models.Model):
    _name = 'accounting.tool'
    _description = 'Accounting Tool Model'
    name = fields.Char()
    description = fields.Char()
    estimated_value = fields.Float()
    date_acquired = fields.Date('Date Acquired')
    model = fields.Char()
    supplier_id = fields.Many2one('accounting.supplier', string='Supplier')
    tool_type_id = fields.Many2one('accounting.tool.type', string='Tool Type')

class ToolType(models.Model):
    _name = 'accounting.tool.type'
    _description = 'Accounting Tool Type Model'
    _rec_name = 'type_name'
    type_name = fields.Char()
