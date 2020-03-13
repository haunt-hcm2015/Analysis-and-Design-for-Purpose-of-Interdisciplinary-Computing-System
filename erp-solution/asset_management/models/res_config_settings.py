# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class ResConfigSettings(models.TransientModel):
    _inherit = 'res.config.settings'
    asset_rent = fields.Boolean(string="Asset Rent", implied_group='asset_management.asset_group_manager')
