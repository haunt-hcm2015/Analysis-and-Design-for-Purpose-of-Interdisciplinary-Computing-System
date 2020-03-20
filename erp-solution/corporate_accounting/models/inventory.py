# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class Inventory(models.Model):
    _name = 'accounting.inventory'
    _description = 'Accounting Inventory Model'