# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class MedicalSupply(models.Model):
    _name = 'medical.supply'
    _description = 'Medical Supply Model'
    supply_type_id = fields.Many2one('medical.supply.type', string='Supply Type')
class MedicalSupplyType(models.Model):
    _name = 'medical.supply.type'
    _description = 'Medical Supply Type Model'
    name = fields.Char('Type Name')
    description = fields.Char()