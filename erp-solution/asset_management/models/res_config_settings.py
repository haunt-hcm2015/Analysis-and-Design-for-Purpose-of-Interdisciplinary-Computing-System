# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class ResConfigSettings(models.TransientModel):
    _inherit = 'res.config.settings'
    asset_rent = fields.Boolean(string="Asset Rent", config_parameter='asset_rent_parameter', implied_group='asset_management.asset_group_manager')

    def set_values(self):
        super(ResConfigSettings, self).set_values()
        if self.asset_rent:
            self.env['ir.config_parameter'].set_param('asset_rent_parameter', True)
         


    

