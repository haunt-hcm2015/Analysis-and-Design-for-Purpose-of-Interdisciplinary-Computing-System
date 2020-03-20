# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class Merchandise(models.Model):
    _inherit = 'store.merchandise'
    _description = 'Financial Merchandise Model'