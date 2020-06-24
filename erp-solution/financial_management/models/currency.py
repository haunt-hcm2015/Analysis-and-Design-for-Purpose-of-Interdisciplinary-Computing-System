# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class Currency(models.Model):
    _inherit = 'accounting.currency'
    _description = 'Currency Model'