# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class Contract(models.Model):
    _name = 'education.contract'
    _description = 'Education Contract Model'
class ContractType(models.Model):
    _name = 'contract.type'
    _description = 'Contract Type Model'