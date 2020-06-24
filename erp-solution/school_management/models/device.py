# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class Device(models.Model):
    _inherit = 'asset.machine'
    _description = 'Devices Model'
   