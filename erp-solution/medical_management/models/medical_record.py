# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class MedicalRecord(models.Model):
    _name = 'medical.record'
    _description = 'Medical Record Model'
    record_type_id = fields.Many2one('medical.record.type', string='Record Type')
class MedicalRecordType(models.Model):
    _name = 'medical.record.type'
    _description = 'Medical Record Type Model'
    name = fields.Char('Type Name')
    description = fields.Char()