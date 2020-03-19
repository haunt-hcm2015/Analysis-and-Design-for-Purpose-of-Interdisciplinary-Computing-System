# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class Medicine(models.Model):
    _name = 'medicine'
    _description = 'Medicine Model'
class MedicineType(models.Model):
    _name = 'medicine.type'
    _description = 'Medicine Type Model'
