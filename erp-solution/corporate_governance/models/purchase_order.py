# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class PurchaseOrder(models.Model):
    _name = 'governance.purchase.order'
    _description = 'Purchase Order Model'