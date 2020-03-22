# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class ToolAndInstrument(models.Model):
    _name = 'asset.tool'
    _description = 'Tools and Instrument Model'
    tool_name = fields.Char('Tool Name')
    state     = fields.Selection([
                            ('inuse', 'In Use'),
                            ('rent', 'Rent'),
                            ('lease', 'Lease'),
                            ('active', 'Active'),
                            ('lost', 'Lost'),
                            ('unused', 'Unused'),
                            ('loan', 'Loan'),
                            ('damaged', 'Damaged'),
                            ('liquidated', 'Liquidated'),
                        ], string='State of Asset')
    date_created   = fields.Date('Date of Recording Increases')
    color = fields.Many2many('color')
    picture = fields.Image('Machine Picture')
    supplier_id = fields.Many2one('res.partner', string='Supplier')
class ToolType(models.Model):
    _name = 'asset.tool.type'
    _description = 'Tools type Model'
    type_name = fields.Char('Type Name')