# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class MedicalSupply(models.Model):
    _name = 'medical.supply'
    _description = 'Medical Supply Model'
class MedicalSupplyType(models.Model):
    _name = 'medical.supply.type'
    _description = 'Medical Supply Type Model'