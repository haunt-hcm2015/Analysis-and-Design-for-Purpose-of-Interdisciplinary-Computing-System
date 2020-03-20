# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class Tool(models.Model):
    _name = 'accounting.tool'
    _description = 'Accounting Tool Model'
class ToolType(models.Model):
    _name = 'accounting.tool.type'
    _description = 'Accounting Tool Type Model'