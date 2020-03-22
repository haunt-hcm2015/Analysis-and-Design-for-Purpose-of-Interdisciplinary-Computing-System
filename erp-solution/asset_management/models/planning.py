# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class Planning(models.Model):
    _name = 'asset.planning'
    _description = 'Planning Model'
    name = fields.Char('Plan Name') 
    plan_price = fields.Float()
  