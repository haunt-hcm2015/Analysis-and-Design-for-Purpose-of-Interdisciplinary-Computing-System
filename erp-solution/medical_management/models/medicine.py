# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class Medicine(models.Model):
    _name = 'medicine'
    _description = 'Medicine Model'
    name = fields.Char('Medicine Name')
    description = fields.Char('Medicine Desription')
    medicine_type_id = fields.Many2one('medical.type', string='Medicine Type')
class MedicineType(models.Model):
    _name = 'medicine.type'
    _description = 'Medicine Type Model'
    name = fields.Char('Type Name')
    description = fields.Char()