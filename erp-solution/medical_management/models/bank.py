# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class Bank(models.Model):
    _inherit = 'accounting.bank.branches'
    _description = 'Bank Model'
