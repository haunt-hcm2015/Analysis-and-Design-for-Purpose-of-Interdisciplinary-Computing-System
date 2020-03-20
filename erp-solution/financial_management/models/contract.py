# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class Contract(models.Model):
    _name = 'financial.contract'
    _description = 'Contract Model'
class ContractType(models.Model):
    _name = 'financial.contract.type'
    _description = 'Contract Type Model'