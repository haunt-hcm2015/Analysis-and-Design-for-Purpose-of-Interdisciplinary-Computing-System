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
    
class ToolType(models.Model):
    _name == 'tool.type'
    _description = 'Tools type Model'
    type_name = fields.Char('Type Name')