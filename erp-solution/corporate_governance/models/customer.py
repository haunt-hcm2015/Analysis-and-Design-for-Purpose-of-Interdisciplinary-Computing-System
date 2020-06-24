# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class Customer(models.Model):
    _inherit = 'accounting.customer'
    _description = 'Customer Model'