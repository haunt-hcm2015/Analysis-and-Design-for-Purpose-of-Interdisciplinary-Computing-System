# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class Supplier(models.Model):
    _inherit = 'accounting.supplier'
    _description = 'Sale Supplier Model'