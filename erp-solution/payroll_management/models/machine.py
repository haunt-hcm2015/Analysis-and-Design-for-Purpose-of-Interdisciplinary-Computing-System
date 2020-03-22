# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class Machine(models.Model):
    _inherit = 'asset.machine'
    _description = 'Machine Model'
