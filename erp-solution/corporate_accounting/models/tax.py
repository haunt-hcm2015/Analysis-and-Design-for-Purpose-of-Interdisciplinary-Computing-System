# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class Tax(models.Model):
    _name = 'accounting.tax'
    _description = 'Accounting Tax Model'