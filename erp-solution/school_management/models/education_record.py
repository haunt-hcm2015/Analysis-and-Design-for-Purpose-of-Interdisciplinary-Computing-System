# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class EducationRecord(models.Model):
    _name = 'school.record'
    _description = 'Education Record'
class RecordType(models.Model):
    _name = 'school.record.type'
    _description = 'Record Type'

    
    

