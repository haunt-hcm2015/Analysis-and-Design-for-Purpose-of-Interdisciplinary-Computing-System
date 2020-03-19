# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class Contract(models.Model):
    _name = 'school.contract'
    _description = 'Education Contract Model'
class ContractType(models.Model):
    _name = 'school.contract.type'
    _description = 'Contract Type Model'