# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class SaleOrder(models.Model):
    _name = 'accounting.sale.order'
    _description = 'Accounting Sale Order Model'