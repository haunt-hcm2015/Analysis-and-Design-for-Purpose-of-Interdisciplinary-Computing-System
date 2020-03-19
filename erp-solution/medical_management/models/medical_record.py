# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class MedicalRecord(models.Model):
    _name = 'medical.record'
    _description = 'Medical Record Model'
class MedicalRecordType(models.Model):
    _name = 'medical.record.type'
    _description = 'Medical Record Type Model'